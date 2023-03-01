<?php

namespace App\Services\PlayerExports;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZanySoft\Zip\Zip;
require_once __DIR__ .'/gpg.php';
class PlayerExportService {
    
    private string $db;
    private string $sqlString;
    
    private string $username;
    
    private Collection $player;
    
    private string $dateString;
    
    private string $fileName;
    
    private string $fileData;
    
    private string $basePath;
    
    private string $extraPath;

    public function __construct($username, $db = 'preservation', $basePath = 'playerexports/')
    {
        $this->db = $db;
        $this->username = $username;
        $this->basePath = $basePath;
    }


    /**
     * Execute the PlayerExportService by generating and returning the SQL string,
     * since we always need the SQL string regardless of what else we do.
     * @return string
     */
    public function execute() : string {
        $this->sqlString = $this->generateSql($this->db);
        $this->dateString = Carbon::now()->format("Y-m-d_h-i-s");
        $this->extraPath = $this->db . "-" . $this->username . "-" . $this->dateString . "/";
        return $this->sqlString;
    }

    /**
     * 
     * @return string
     * @throws FileNotFoundException
     */
    public function generateFile() : string {
        $basename = $this->db . "-" . $this->username . "-" . $this->dateString;
        $sqlfile =  $this->basePath . $this->extraPath . "playerdata.sql";
        $zipfile = $this->basePath . $this->extraPath . $basename . '.zip';
        $tempzipfile = $this->basePath . $this->extraPath . 'data.zip';
        $gpgfile = $this->basePath . $this->extraPath . 'data.zip.gpg';
        $sqlitefile = $this->basePath . $this->extraPath . 'playerdata.db';
        $txtfile = $this->basePath . $this->extraPath . 'metadata.txt';
        Storage::disk('local')->put($sqlfile, $this->sqlString);
        Storage::disk('local')->put($this->basePath . $this->extraPath . "playerdata.db", Storage::disk('sqlite')->get($this->db . ".db"));
        Config::set("database.connections.$basename", [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', storage_path("app/" . $sqlitefile)),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', false),
        ]);
        $sqlArray = explode("\n", $this->sqlString);
        foreach ($sqlArray as $statement) {
            if (empty($statement)) continue;
            DB::connection($basename)->statement($statement);
        }        
        $text = "Server: $this->db \n";
        $text .= "Timestamp: " . floor(microtime(true) * 1000) . "\n";
        $text .= "Muted: " . $this->player[0]->muted . "\n";
        $text .= "Banned: " . $this->player[0]->banned . "\n";
        $text .= "Offences: " . $this->player[0]->offences . "\n";
        $text .= "GPG Link: https://rsc.vet/openrsc-gpg-public-key-2023-02-16.key" . "\n";
        $text .= "GPG Archive Link: https://web.archive.org/web/20230224020441/https://rsc.vet/openrsc-gpg-public-key-2023-02-16.key";
        Storage::disk('local')->put($txtfile, $text);
        $zip = new Zip();
        try {
            $gpg = new GnuPG();
            $private = $gpg->importKeys(file_get_contents(config('openrsc.gpg_private_key_file')));
            $public = $gpg->importKeys(file_get_contents(config('openrsc.gpg_public_key_file')));
            $zip->create(storage_path("app/" . $tempzipfile), true);
            $zip->add(storage_path("app/" . $sqlitefile));
            $zip->add(storage_path("app/" . $sqlfile));
            $zip->add(storage_path("app/" . $txtfile));
            $zip->close();
            $gpgdata = $gpg->encrypt(file_get_contents(storage_path("app/" . $tempzipfile)), $private->results[0]['fingerprint'], $private->results[0]['fingerprint'], null, true);
            Storage::disk('local')->put($gpgfile, $gpgdata->data);                    
        } catch (\Exception $e) {
            \Log::error("Player Export GPG exception: " . $e->getMessage());
        }
        try {
            $zip->create(storage_path("app/" . $zipfile));
            $zip->add(storage_path("app/" . $sqlitefile));
            $zip->add(storage_path("app/" . $sqlfile));
            $zip->add(storage_path("app/" . $txtfile));
            $zip->add(storage_path("app/" . $gpgfile));
            $zip->close();
        } catch (\Exception $e) {
            \Log::error("Error creating zip $zipfile: " . $e->getMessage());
            return redirect(route('PlayerExportView'))->withErrors("Error creating Player Export, please try again later.");
        }            
        Storage::disk('local')->delete($sqlfile);
        Storage::disk('local')->delete($sqlitefile);
        Storage::disk('local')->delete($txtfile);
        Storage::disk('local')->delete($tempzipfile);
        Storage::disk('local')->delete($gpgfile);
        $this->fileName = $this->db . "-" . $this->username . "-" . $this->dateString . ".zip";
        $this->generateFileExportLog();
        $this->fileData = file_get_contents(storage_path("app/" . $this->basePath . $this->extraPath . $this->fileName));
        return $this->fileData;
    }
    
    public function generateEmail() {
        //TODO: implement method for generating email if we want to in the future, it's not a requirement for now. 
    }

    /**
     * Generate
     * @param $db string The database to generate SQL queries from.
     * @return string
     */
    public function generateSql($db = 'preservation') : string {
        $this->player = DB::connection($db)
            ->table('players')
            ->select('*')
            ->where('username', '=', $this->username)
            ->get();
        $player_id = $this->player[0]->id;
        $this->sqlString = $this->buildInsert("players", $this->player, ["petfatigue", "pets", "transfer"], ["banned", "muted", "offences"]) . "\n";
        $inv_items = DB::connection($db)
            ->table('invitems')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("invitems", $inv_items) . "\n";
        $bank_items = DB::connection($db)
            ->table('bank')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("bank", $bank_items) . "\n";
        $item_status_ids = [];
        foreach($inv_items as $inv_item) {
            $item_status_ids[] = $inv_item->itemID;
        }
        foreach($bank_items as $bank_item) {
            $item_status_ids[] = $bank_item->itemID;
        }
        $item_statuses = DB::connection($db)
            ->table('itemstatuses')
            ->select('*')
            ->whereIn('itemID', $item_status_ids)
            ->get();
        $this->sqlString .= $this->buildInsert("itemstatuses", $item_statuses) . "\n";
        $player_cache = DB::connection($db)
            ->table('player_cache')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("player_cache", $player_cache) . "\n";
        $maxstats = DB::connection($db)
            ->table('maxstats')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("maxstats", $maxstats) . "\n";
        $curstats = DB::connection($db)
            ->table('curstats')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("curstats", $curstats) . "\n";
        $experience = DB::connection($db)
            ->table('experience')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("experience", $experience) . "\n";
        $quests = DB::connection($db)
            ->table('quests')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("quests", $quests) . "\n";
        //Ironman could be cabbage/coleslaw-only, but it's not currently.
        $ironman = DB::connection($db)
            ->table('ironman')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("ironman", $ironman) . "\n";
        $player_recovery = DB::connection($db)
            ->table('player_recovery')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("player_recovery", $player_recovery) . "\n";
        $player_change_recovery = DB::connection($db)
            ->table('player_change_recovery')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("player_change_recovery", $player_change_recovery) . "\n";
        $player_contact_details = DB::connection($db)
            ->table('player_contact_details')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("player_contact_details", $player_contact_details) . "\n";
        $former_names = DB::connection($db)
            ->table('former_names')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("former_names", $former_names) . "\n";
        $capped_experience = DB::connection($db)
            ->table('capped_experience')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("capped_experience", $capped_experience) . "\n";
        $friends = DB::connection($db)
            ->table('friends')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("friends", $friends) . "\n";
        $ignores = DB::connection($db)
            ->table('ignores')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("ignores", $ignores) . "\n";
        $npckills = DB::connection($db)
            ->table('npckills')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert("npckills", $npckills) . "\n";
        if ($db === "cabbage" || $db === "coleslaw") {
            $auctions = DB::connection($db)
            ->table('auctions')
            ->select('*')
            ->where('seller', '=', $player_id)
            ->get();
            $this->sqlString .= $this->buildInsert("auctions", $auctions) . "\n";
            $expired_auctions = DB::connection($db)
            ->table('expired_auctions')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
            $this->sqlString .= $this->buildInsert("expired_auctions", $expired_auctions) . "\n";
            $bankpresets = DB::connection($db)
            ->table('bankpresets')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
            $this->sqlString .= $this->buildInsert("bankpresets", $bankpresets) . "\n";
            $equipped = DB::connection($db)
            ->table('equipped')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
             $this->sqlString .= $this->buildInsert("equipped", $equipped) . "\n";
        }
        return $this->sqlString;
    }
    
    public function generateFileExportLog() {
        DB::connection('laravel')->table('playerexports')->insert([
            'game' => $this->db,
            'username' => $this->username,
            'date_string' => $this->dateString,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    
    public function generateAttachmentHeaders() {
        return [
            'Content-type' => 'application/zip', 
            'Content-Disposition' => sprintf('attachment; filename="%s"', $this->getFileName()),
            'Content-Length' => strlen($this->getFileData())
        ];
    }
    
    private function buildInsert($table, $records, $ignoredColumns = [], $resetColumns = []) {
        $data = "";
        foreach ($records as $record) {
            $record = (array)$record;

            foreach ($ignoredColumns as $ignoredColumn) {
                unset($record[$ignoredColumn]);
            }

            foreach ($resetColumns as $resetColumn) {
                if (isset($record[$resetColumn]) && $record[$resetColumn] !== 0) {
                    $record[$resetColumn] = 0;
                }
            }
            if (isset($record['whoChanged']) && ($record['whoChanged'] === "Marwolf" || $record['whoChanged'] === "Kenix" || str_starts_with($record['whoChanged'], "Mod "))) {
                $record['whoChanged'] = "Moderator";
            }
            $newRecords[] = $record;
        }
        if (!isset($records[0])) {
            return $data;
        }
        $table_column_array = array_keys((array)$newRecords[0]);
        
        foreach ($table_column_array as $key => $name) {
            $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
        }

        
        $data .= "\nINSERT INTO $table (";

        $data .= "" . implode(", ", $table_column_array) . ") VALUES ";
        foreach ($newRecords as $record) {
            $table_value_array = array_values((array)$record);
            foreach($table_value_array as $key => $record_column) {
                $table_value_array[$key] = addslashes($record_column);
            }
            
            $data .= "('" . implode("','", str_replace("\n", "", $table_value_array)) . "'),";
        }
        $data = rtrim($data, ",");
        $data .= ";";
        return $data;
    }

    /**
     * @return string
     */
    public function getSqlString(): string
    {
        return $this->sqlString;
    }

    /**
     * @return string
     */
    public function getDateString(): string
    {
        return $this->dateString;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getFileData(): string
    {
        return $this->fileData;
    }

    /**
     * @return string
     */
    public function getBasePath(): string
    {
        return $this->basePath;
    }

    /**
     * @return string
     */
    public function getExtraPath(): string
    {
        return $this->extraPath;
    }
}