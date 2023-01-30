<?php
namespace App\Services\Stats;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StatsService {
    
    private array $stats;
    private string $db;
    
    public function __construct($db = 'cabbage') {
        $this->db = $db;
    }
    public function execute() : array {
        $this->stats = $this->generateData($this->db);
        
        return $this->stats;
    }
    
    public function generateData($db = 'cabbage') :  array {
        $online = DB::connection($db)->table('players')
            ->where('online', '=', '1')
            ->count('online');

        $registrations = DB::connection($db)->table('players')
                ->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
                ->count() ?? '0';

        $logins48 = DB::connection($db)->table('players')
            ->whereRaw('login_date >= unix_timestamp(current_date - interval 48 hour)')
            ->orderBy('login_date', 'desc')
            ->count();

        $totalPlayers = DB::connection($db)->table('players')
                ->count() ?? '0';

        $uniquePlayers = DB::connection($db)->table('players')
            ->distinct('creation_ip')
            ->count('creation_ip');

        $createdToday = DB::connection($db)->table('players')
            ->whereRaw('creation_date >= unix_timestamp(current_date - interval 1 day)')
            ->orderBy('login_date', 'desc')
            ->orderBy('creation_date', 'desc')
            ->count();

        $current_timestamp = now()->timestamp;

        $sumgold_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $sumgold_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $sumgold = $sumgold_B + $sumgold_I;

        $gold1m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '1000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold1m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '1000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold1m = $gold1m_B + $gold1m_I;

        $gold5m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '5000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold5m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '4000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold5m = $gold5m_B + $gold5m_I;

        $gold10m_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '10000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold10m_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
            ->where([
                ['S.catalogID', '=', '10'],
                ['S.amount', '>=', '10000000'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
            ])
            ->sum('S.amount');

        $gold10m = $gold10m_B + $gold10m_I;

        $pumpkin_B = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '422'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $pumpkin_I = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '422'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $pumpkin_A = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $pumpkin_A = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '422'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $pumpkin = $pumpkin_B + $pumpkin_I + $pumpkin_A;     
        
        $cracker_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '575'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $cracker_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '575'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $cracker_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $cracker_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '575'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $cracker = $cracker_b + $cracker_i + $cracker_a;
        
        $redphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '576'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $redphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '576'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $redphat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $redphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '576'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $redphat = $redphat_b + $redphat_i + $redphat_a;
        
        $yellowphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '577'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $yellowphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '577'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $yellowphat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $yellowphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '577'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $yellowphat = $yellowphat_b + $yellowphat_i + $yellowphat_a;
        
        $bluephat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '578'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $bluephat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '578'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $bluephat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $bluephat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '578'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $bluephat = $bluephat_b + $bluephat_i + $bluephat_a;
        
        $greenphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '579'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $greenphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '579'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $greenphat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $greenphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '579'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $greenphat = $greenphat_b + $greenphat_i + $greenphat_a;
        
        $pinkphat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '580'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $pinkphat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '580'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $pinkphat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $pinkphat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '580'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $pinkphat = $pinkphat_b + $pinkphat_i + $pinkphat_a;
        
        $whitephat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '581'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $whitephat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '581'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $whitephat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $whitephat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '581'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $whitephat = $whitephat_b + $whitephat_i + $whitephat_a;
        
        $easteregg_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '677'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $easteregg_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '677'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $easteregg_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $easteregg_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '677'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $easteregg = $easteregg_b + $easteregg_i + $easteregg_a;

        $redmask_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '831'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $redmask_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '831'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $redmask_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $redmask_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '831'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $redmask = $redmask_b + $redmask_i + $redmask_a;

        $bluemask_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '832'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $bluemask_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '832'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $bluemask_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $bluemask_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '832'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $bluemask = $bluemask_b + $bluemask_i + $bluemask_a;

        $greenmask_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '828'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $greenmask_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '828'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $greenmask_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $greenmask_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '828'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $greenmask = $greenmask_b + $greenmask_i + $greenmask_a;

        $santahat_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '971'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $santahat_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '971'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $santahat_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $santahat_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '971'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $santahat = $santahat_b + $santahat_i + $santahat_a;

        $scythe_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '1289'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $scythe_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '1289'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $scythe_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $scythe_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '1289'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $scythe = $scythe_b + $scythe_i + $scythe_a;

        $dsq_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '1278'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $dsq_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '1278'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $dsq_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $dsq_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '1278'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $dsq = $dsq_b + $dsq_i + $dsq_a;

        $dmed_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '795'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $dmed_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '795'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $dmed_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $dmed_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '795'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $dmed = $dmed_b + $dmed_i + $dmed_a;

        $dammy_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '522'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $dammy_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '522'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $dammy_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $dammy_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '522'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $dammy = $dammy_b + $dammy_i + $dammy_a;

        $dbattle_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '594'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $dbattle_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '594'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $dbattle_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $dbattle_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '594'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $dbattle = $dbattle_b + $dbattle_i + $dbattle_a;

        $dlong_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '593'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $dlong_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '593'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $dlong_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $dlong_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '593'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $dlong = $dlong_b + $dlong_i + $dlong_a;
        
        $rune2h_b = DB::connection($db)->table('bank as B') // bank
        ->join('players AS A', 'B.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'B.itemID')
        ->where([
            ['S.catalogID', '=', '81'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');

        $rune2h_i = DB::connection($db)->table('invitems as I') // inventory
        ->join('players AS A', 'I.playerID', '=', 'A.id')
        ->join('itemstatuses AS S', 'S.itemID', '=', 'I.itemID')
        ->where([
            ['S.catalogID', '=', '81'],
            ['S.amount', '>=', '1'],
            ['A.group_id', '=', '10'],
            ['A.banned', '!=', '1'],
        ])
        ->sum('S.amount');
        
        $rune2h_a = 0;
        if ($db === 'cabbage' || $db === 'coleslaw') {
            $rune2h_a = DB::connection($db)->table('auctions as U') // auction
            ->join('players AS A', 'U.seller_username', '=', 'A.username')
            ->join('itemstatuses AS S', 'S.itemID', '=', 'U.itemID')
            ->where([
                ['S.catalogID', '=', '81'],
                ['S.amount', '>=', '1'],
                ['A.group_id', '=', '10'],
                ['A.banned', '!=', '1'],
                ['U.was_cancel', '=', '0'],
                ['U.sold-out', '=', '0'],
                ['U.amount_left', '>', '0'],
            ])
            ->sum('S.amount');
        }
        $rune2h = $rune2h_b + $rune2h_i + $rune2h_a;
        
        return [
                'online' => $online,
                'registrations' => $registrations,
                'logins48' => $logins48,
                'totalPlayers' => $totalPlayers,
                'uniquePlayers' => $uniquePlayers,
                'createdToday' => $createdToday,
                'sumgold' => $sumgold,
                'gold1m' => $gold1m,
                'gold5m' => $gold5m,
                'gold10m' => $gold10m,
                'pumpkin' => $pumpkin,
                'cracker' => $cracker,
                'redphat' => $redphat,
                'yellowphat' => $yellowphat,
                'bluephat' => $bluephat,
                'greenphat' => $greenphat,
                'pinkphat' => $pinkphat,
                'whitephat' => $whitephat,
                'easteregg' => $easteregg,
                'redmask' => $redmask,
                'bluemask' => $bluemask,
                'greenmask' => $greenmask,
                'santahat' => $santahat,
                'scythe' => $scythe,
                'dsq' => $dsq,
                'dmed' => $dmed,
                'dammy' => $dammy,
                'dbattle' => $dbattle,
                'dlong' => $dlong,
                'rune2h' => $rune2h,
            ];
    }
    
    public function makeCsv($path = 'csv/stats/') : bool {
        $data = "Statistics for " . $this->db . ": " . Carbon::now()->format("Y-m-d_h:i A") . "\n";
        foreach ($this->stats as $key => $value) {
            $data .= "$key, $value\n";
        }
        return Storage::disk('local')->put($path . Carbon::now()->format("Y") . "/" . $this->db . "_stats_" . Carbon::now()->format("Y-m-d") . "_".  Carbon::now()->format("hA") . ".csv", $data);
    }
    
}