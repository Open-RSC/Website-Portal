<?php

namespace App\Services\PlayerExports;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

require_once __DIR__.'/gpg.php';
class PlayerExportService
{
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
     */
    public function execute(): string
    {
        $this->sqlString = $this->generateSql($this->db);
        $this->dateString = Carbon::now()->format('Y-m-d_h-i-s');
        $this->extraPath = $this->db.'-'.$this->username.'-'.$this->dateString.'/';

        return $this->sqlString;
    }

    /**
     * @throws FileNotFoundException
     */
    public function generateFile(): string
    {
        $basename = $this->db . '-' . $this->username . '-' . $this->dateString;
        $exportPath = storage_path('app/private/' . $this->extraPath);
        $sqlfile = $this->basePath . $this->extraPath . 'playerdata.sql';
        $zipfile = $this->basePath . $this->extraPath . $basename . '.zip';
        $tempzipfile = $this->basePath . $this->extraPath . 'data.zip';
        $gpgfile = $this->basePath . $this->extraPath . 'data.zip.gpg';
        $sqlitefile = $this->basePath . $this->extraPath . 'playerdata.db';
        $txtfile = $this->basePath . $this->extraPath . 'metadata.txt';

        \Log::info("Generating player export for username: {$this->username}, DB: {$this->db}");
        \Log::info("Export path: {$exportPath}");

        // Step 1: Ensure export directory exists
        if (!file_exists($exportPath)) {
            if (!mkdir($exportPath, 0775, true)) {
                \Log::error("Failed to create export directory: {$exportPath}");
                throw new \Exception("Failed to create export directory: {$exportPath}");
            } else {
                \Log::info("Successfully created export directory: {$exportPath}");
            }
        }

        // Step 2: Store SQL file
        try {
            Storage::disk('local')->put($sqlfile, $this->sqlString);
            \Log::info("SQL file stored successfully at: {$sqlfile}");
        } catch (\Exception $e) {
            \Log::error("Error writing SQL file: " . $e->getMessage());
            throw $e;
        }

        // Step 3: Verify SQLite database file exists
        $sqliteFilePath = storage_path('app/private/' . $sqlitefile);
        \Log::info("Checking SQLite file at: {$sqliteFilePath}");

        if (!Storage::disk('sqlite')->exists($this->db . '.db')) {
            \Log::error("SQLite file missing: " . Storage::disk('sqlite')->path($this->db . '.db'));
            throw new \Exception("SQLite file does not exist at path: " . Storage::disk('sqlite')->path($this->db . '.db'));
        }

        // Step 4: Copy SQLite database file to local storage
        try {
            Storage::disk('local')->put($sqlitefile, Storage::disk('sqlite')->get($this->db . '.db'));
            \Log::info("Copied SQLite file to local storage: {$sqlitefile}");
        } catch (\Exception $e) {
            \Log::error("Error copying SQLite file: " . $e->getMessage());
            throw $e;
        }

        // Step 5: Configure SQLite connection
        Config::set("database.connections.$basename", [
            'driver' => 'sqlite',
            'database' => $sqliteFilePath,
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', false),
        ]);
        \Log::info("Configured SQLite connection: {$basename}");

        // Step 6: Execute SQL statements
        $sqlArray = explode("\n", $this->sqlString);
        foreach ($sqlArray as $statement) {
            if (empty(trim($statement))) {
                continue;
            }
            try {
                DB::connection($basename)->statement($statement);
                \Log::info("Executed SQL statement: " . substr($statement, 0, 100) . "...");
            } catch (\Exception $e) {
                \Log::error("SQL execution error: " . $e->getMessage());
                throw $e;
            }
        }

        \Log::info("SQL execution completed for: {$basename}");

        // Step 7: Create metadata text file
        $text = "Server: {$this->db}\n";
        $text .= 'Timestamp: ' . floor(microtime(true) * 1000) . "\n";
        $text .= 'Muted: ' . $this->player[0]->muted . "\n";
        $text .= 'Banned: ' . $this->player[0]->banned . "\n";
        $text .= 'Offences: ' . $this->player[0]->offences . "\n";
        $text .= 'GPG Link: https://rsc.vet/openrsc-gpg-public-key-2023-02-16.key' . "\n";
        Storage::disk('local')->put($txtfile, $text);
        \Log::info("Metadata file created at: {$txtfile}");

        // Step 8: Create GPG zip archive
        try {
            $zip = new ZipArchive;
            $gpg = new GnuPG;
            $private = $gpg->importKeys(file_get_contents(config('openrsc.gpg_private_key_file')));
            if ($zip->open(storage_path('app/private/' . $tempzipfile), ZipArchive::CREATE) === true) {
                $zip->addFile(storage_path('app/private/' . $sqlitefile), 'playerdata.db');
                $zip->addFile(storage_path('app/private/' . $sqlfile), 'playerdata.sql');
                $zip->addFile(storage_path('app/private/' . $txtfile), 'metadata.txt');
                $zip->close();
                \Log::info("Temporary zip file created: {$tempzipfile}");
            }
            $gpgdata = $gpg->signFile(storage_path('app/private/' . $tempzipfile), $private->results[0]['fingerprint']);
            Storage::disk('local')->put($gpgfile, $gpgdata->data);
            \Log::info("GPG file signed at: {$gpgfile}");
        } catch (\Exception $e) {
            \Log::error("GPG exception: " . $e->getMessage());
        }

        // Step 9: Create the final zip archive
        try {
            if ($zip->open(storage_path('app/private/' . $zipfile), ZipArchive::CREATE) === true) {
                $zip->addFile(storage_path('app/private/' . $sqlitefile), 'playerdata.db');
                $zip->addFile(storage_path('app/private/' . $sqlfile), 'playerdata.sql');
                $zip->addFile(storage_path('app/private/' . $txtfile), 'metadata.txt');
                $zip->addFile(storage_path('app/private/' . $gpgfile), 'data.zip.gpg');
                $zip->close();
                \Log::info("Final zip archive created at: {$zipfile}");
            }
        } catch (\Exception $e) {
            \Log::error("Error creating zip: " . $e->getMessage());
            return redirect(route('PlayerExportView'))->withErrors('Error creating Player Export, please try again later.');
        }

        // Step 10: Cleanup temporary files
        Storage::disk('local')->delete([$sqlfile, $sqlitefile, $txtfile, $tempzipfile, $gpgfile]);
        \Log::info("Cleanup complete: Deleted temporary files");

        // Step 11: Set file name and generate export log
        $this->fileName = $basename . '.zip';
        $this->generateFileExportLog();
        $this->fileData = file_get_contents(storage_path('app/private/' . $this->basePath . $this->extraPath . $this->fileName));

        \Log::info("Player export completed successfully for: {$basename}");

        return $this->fileData;
    }

    public function generateEmail()
    {
        // TODO: implement method for generating email if we want to in the future, it's not a requirement for now.
    }

    /**
     * Generate
     *
     * @param  $db  string The database to generate SQL queries from.
     */
    public function generateSql($db = 'preservation'): string
    {
        $this->player = DB::connection($db)
            ->table('players')
            ->select('*')
            ->where('username', '=', $this->username)
            ->get();
        $player_id = $this->player[0]->id;
        $this->sqlString = $this->buildInsert('players', $this->player, ['petfatigue', 'pets', 'transfer'], ['banned', 'muted', 'offences'], ['lastRecoveryTryId'], ['salt', 'pass'], ['salt', 'pass'])."\n";
        $inv_items = DB::connection($db)
            ->table('invitems')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('invitems', $inv_items)."\n";
        $bank_items = DB::connection($db)
            ->table('bank')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('bank', $bank_items)."\n";
        $item_status_ids = [];
        foreach ($inv_items as $inv_item) {
            $item_status_ids[] = $inv_item->itemID;
        }
        foreach ($bank_items as $bank_item) {
            $item_status_ids[] = $bank_item->itemID;
        }
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $equipped = DB::connection($db)
                ->table('equipped')
                ->select('*')
                ->where('playerID', '=', $player_id)
                ->get();
            $this->sqlString .= $this->buildInsert('equipped', $equipped)."\n";
            foreach ($equipped as $equip_item) {
                $item_status_ids[] = $equip_item->itemID;
            }
        }
        $item_statuses = DB::connection($db)
            ->table('itemstatuses')
            ->select('*')
            ->whereIn('itemID', $item_status_ids)
            ->get();
        $this->sqlString .= $this->buildInsert('itemstatuses', $item_statuses)."\n";
        $player_cache = DB::connection($db)
            ->table('player_cache')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('player_cache', $player_cache)."\n";
        $maxstats = DB::connection($db)
            ->table('maxstats')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('maxstats', $maxstats)."\n";
        $curstats = DB::connection($db)
            ->table('curstats')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('curstats', $curstats)."\n";
        $experience = DB::connection($db)
            ->table('experience')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('experience', $experience)."\n";
        $quests = DB::connection($db)
            ->table('quests')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('quests', $quests)."\n";
        // Ironman could be cabbage/coleslaw-only, but it's not currently.
        $ironman = DB::connection($db)
            ->table('ironman')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('ironman', $ironman)."\n";
        $player_recovery = DB::connection($db)
            ->table('player_recovery')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('player_recovery', $player_recovery, ignoredColumns: [], resetColumns: [], unsetIfEmptyColumns: [], skipSlashColumns: ['question1', 'question2', 'question3', 'question4', 'question5'], replaceQuoteColumns: ['question1', 'question2', 'question3', 'question4', 'question5'])."\n";
        $player_change_recovery = DB::connection($db)
            ->table('player_change_recovery')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('player_change_recovery', $player_change_recovery, ignoredColumns: [], resetColumns: [], unsetIfEmptyColumns: [], skipSlashColumns: ['question1', 'question2', 'question3', 'question4', 'question5'], replaceQuoteColumns: ['question1', 'question2', 'question3', 'question4', 'question5'])."\n";
        $player_contact_details = DB::connection($db)
            ->table('player_contact_details')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('player_contact_details', $player_contact_details)."\n";
        $former_names = DB::connection($db)
            ->table('former_names')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('former_names', $former_names, ignoredColumns: [], resetColumns: [], unsetIfEmptyColumns: [], skipSlashColumns: ['reason'], replaceQuoteColumns: ['reason'])."\n";
        $capped_experience = DB::connection($db)
            ->table('capped_experience')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('capped_experience', $capped_experience, ignoredColumns: [], resetColumns: [], unsetIfEmptyColumns: ['attack', 'defense', 'strength', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving'])."\n";
        $friends = DB::connection($db)
            ->table('friends')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('friends', $friends)."\n";
        $ignores = DB::connection($db)
            ->table('ignores')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('ignores', $ignores)."\n";
        $npckills = DB::connection($db)
            ->table('npckills')
            ->select('*')
            ->where('playerID', '=', $player_id)
            ->get();
        $this->sqlString .= $this->buildInsert('npckills', $npckills)."\n";
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $auctions = DB::connection($db)
                ->table('auctions')
                ->select('*')
                ->where('seller', '=', $player_id)
                ->get();
            $this->sqlString .= $this->buildInsert('auctions', $auctions)."\n";
            $expired_auctions = DB::connection($db)
                ->table('expired_auctions')
                ->select('*')
                ->where('playerID', '=', $player_id)
                ->get();
            $this->sqlString .= $this->buildInsert('expired_auctions', $expired_auctions)."\n";
            $bankpresets = DB::connection($db)
                ->table('bankpresets')
                ->select('*')
                ->where('playerID', '=', $player_id)
                ->get();
            $this->sqlString .= $this->buildInsert('bankpresets', $bankpresets)."\n";
        }

        return $this->sqlString;
    }

    public function generateFileExportLog()
    {
        DB::connection('laravel')->table('playerexports')->insert([
            'game' => $this->db,
            'username' => $this->username,
            'date_string' => $this->dateString,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function generateAttachmentHeaders()
    {
        return [
            'Content-type' => 'application/zip',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $this->getFileName()),
            'Content-Length' => strlen($this->getFileData()),
        ];
    }

    /**
     * This lovely function generates our insert statements for player exports.
     *
     * @param  $table  string The database table to build the insert statement for.
     * @param  $records  array | \Illuminate\Support\Collection The records we will be inserting into the database table.
     * @param  $ignoredColumns  array The columns we will not be inserting into the database table. This is primarily used for columns that are missing in our SQLite databases but exist in our MySQL/MariaDB databases.
     * @param  $resetColumns  array The columns we will be resetting to value 0.
     * @param  $unsetIfEmptyColumns  array The columns we will be unsetting, so they can have their default value (or NULL). This is primarily used for columns in our MySQL/MariaDB databases that do not accept an empty string but do accept NULL or have a default value.
     * @param  $skipSlashColumns  array The columns we will not be replacing quotes with backslashes. A good example of this would be salt or pass hashes because they may contain a quotation mark that we would want to preserve.
     * @param  $replaceQuoteColumns  array The columns that we will replace individual quotes with two individual quotes, this is so that the columns can preserve the individual quotes. An example of this would be a salt or pass hashes that may contain a quotation mark we would want to preserve. Also, $replaceQuoteColumns requires a matching column in $skipSlashColumns.
     */
    private function buildInsert($table, $records, $ignoredColumns = [], $resetColumns = [], $unsetIfEmptyColumns = [], $skipSlashColumns = [], $replaceQuoteColumns = []): string
    {
        $data = '';
        foreach ($records as $record) {
            $record = (array) $record;

            foreach ($ignoredColumns as $ignoredColumn) {
                unset($record[$ignoredColumn]);
            }

            foreach ($resetColumns as $resetColumn) {
                if (isset($record[$resetColumn]) && $record[$resetColumn] !== 0) {
                    $record[$resetColumn] = 0;
                }
            }
            foreach ($record as $key => $value) {
                if (((string) $value) === '' && in_array($key, $unsetIfEmptyColumns, true)) {
                    unset($record[$key]);
                }
            }
            if (isset($record['whoChanged']) && ($record['whoChanged'] === 'Marwolf' || $record['whoChanged'] === 'Kenix' || str_starts_with($record['whoChanged'], 'Mod '))) {
                $record['whoChanged'] = 'Moderator';
            }
            $newRecords[] = $record;
        }
        if (! isset($records[0])) {
            return $data;
        }
        $table_column_array = array_keys((array) $newRecords[0]);

        foreach ($table_column_array as $key => $name) {
            $table_column_array[$key] = '`'.$table_column_array[$key].'`';
        }
        $data .= "\nINSERT INTO $table (";
        $data .= ''.implode(', ', $table_column_array).') VALUES ';
        foreach ($newRecords as $record) {
            $table_value_array = array_values((array) $record);
            foreach ($table_value_array as $key => $record_column) {
                $table_value_array[$key] = addslashes($record_column);
                if (in_array(str_replace('`', '', $table_column_array[$key]), $skipSlashColumns, true)) {
                    $table_value_array[$key] = $record_column;
                    if (in_array(str_replace('`', '', $table_column_array[$key]), $replaceQuoteColumns, true)) {
                        $table_value_array[$key] = str_replace("'", "''", $record_column);
                    }
                }
            }
            $data .= "('".implode("','", str_replace("\n", '', $table_value_array))."'),";
        }
        $data = rtrim($data, ',');
        $data .= ';';

        return $data;
    }

    public function getSqlString(): string
    {
        return $this->sqlString;
    }

    public function getDateString(): string
    {
        return $this->dateString;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getFileData(): string
    {
        return $this->fileData;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function getExtraPath(): string
    {
        return $this->extraPath;
    }
}
