<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\TopList::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('toplist:bi-monthly')
            ->twiceMonthly(1, 16, '12:00');
        
        if (config('openrsc.stats_csv_hourly_job_enabled')) {
            $schedule->command('stats:generate-csv preservation')
                    ->cron('6 */1 * * *');
            $schedule->command('stats:generate-csv cabbage')
                    ->cron('7 */1 * * *');
            //$schedule->command('stats:generate-csv 2001scape')
            //        ->cron('8 */1 * * *'); //I do not think 2001scape has all the items that we check.
            $schedule->command('stats:generate-csv uranium')
                    ->cron('9 */1 * * *');
            $schedule->command('stats:generate-csv coleslaw')
                    ->cron('10 */1 * * *');
            $schedule->command('stats:generate-csv openpk')
                    ->cron('11 */1 * * *');
        }
        //TODO: We should probably add clean-up at some point,
        //even though it's less than 1kb per CSV file so 20MB per year.
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
