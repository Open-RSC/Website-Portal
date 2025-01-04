<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// SCHEDULED COMMANDS
// In order to get scheduled commands to run, we need a cron job on our server to run the scheduler: * * * * * php /path/to/portal/artisan schedule:run >> /dev/null 2>&1

// Schedule::command('inspire')->hourly();

Schedule::command('toplist:bi-monthly')
    ->twiceMonthly(1, 16, '12:00');

//TODO: We should probably add clean-up for stats CSVs at some point, even though it's less than 1kb per CSV file so 20MB per year.

// HOURLY JOBS
if (config('openrsc.stats_hourly_csv_job_enabled')) {
    // Hourly CSV Jobs
    Schedule::command('stats:generate-csv preservation')
        ->cron('6 */1 * * *');
    Schedule::command('stats:generate-csv cabbage')
        ->cron('7 */1 * * *');
    //Schedule::command('stats:generate-csv 2001scape')
    //        ->cron('8 */1 * * *'); //I do not think 2001scape has all the items that we check.
    Schedule::command('stats:generate-csv uranium')
        ->cron('9 */1 * * *');
    Schedule::command('stats:generate-csv coleslaw')
        ->cron('10 */1 * * *');
    Schedule::command('stats:generate-csv openpk')
        ->cron('11 */1 * * *');
} elseif (config('openrsc.stats_hourly_job_enabled')) {
    // Hourly Stats Generation
    Schedule::command('stats:generate preservation')
        ->cron('6 */1 * * *');
    Schedule::command('stats:generate cabbage')
        ->cron('7 */1 * * *');
    //Schedule::command('stats:generate 2001scape')
    //        ->cron('8 */1 * * *'); //I do not think 2001scape has all the items that we check.
    Schedule::command('stats:generate uranium')
        ->cron('9 */1 * * *');
    Schedule::command('stats:generate coleslaw')
        ->cron('10 */1 * * *');
    Schedule::command('stats:generate openpk')
        ->cron('11 */1 * * *');
}

// DAILY JOBS
if (config('openrsc.stats_daily_csv_job_enabled')) {
    // Daily CSV Jobs
    Schedule::command('stats:generate-csv preservation')
        ->dailyAt('00:16');
    Schedule::command('stats:generate-csv cabbage')
        ->dailyAt('00:17');
    Schedule::command('stats:generate-csv uranium')
        ->dailyAt('00:18');
    Schedule::command('stats:generate-csv coleslaw')
        ->dailyAt('00:20');
    Schedule::command('stats:generate-csv openpk')
        ->dailyAt('00:21');
} elseif (config('openrsc.stats_daily_job_enabled')) {
    // Daily Stats Generation
    Schedule::command('stats:generate preservation')
        ->dailyAt('00:16');
    Schedule::command('stats:generate cabbage')
        ->dailyAt('00:17');
    Schedule::command('stats:generate uranium')
        ->dailyAt('00:19');
    Schedule::command('stats:generate coleslaw')
        ->dailyAt('00:20');
    Schedule::command('stats:generate openpk')
        ->dailyAt('00:21');
}

// WEEKLY JOBS
if (config('openrsc.stats_weekly_csv_job_enabled')) {
    // Weekly CSV Jobs
    Schedule::command('stats:generate-csv preservation')
        ->weeklyOn(1, '00:26'); // Every Monday at 12:26 AM
    Schedule::command('stats:generate-csv cabbage')
        ->weeklyOn(1, '00:27');
    Schedule::command('stats:generate-csv uranium')
        ->weeklyOn(1, '00:29');
    Schedule::command('stats:generate-csv coleslaw')
        ->weeklyOn(1, '00:30');
    Schedule::command('stats:generate-csv openpk')
        ->weeklyOn(1, '00:31');
} elseif (config('openrsc.stats_weekly_job_enabled')) {
    // Weekly Stats Generation
    Schedule::command('stats:generate preservation')
        ->weeklyOn(1, '00:26'); // Every Monday at 12:26 AM
    Schedule::command('stats:generate cabbage')
        ->weeklyOn(1, '00:27');
    Schedule::command('stats:generate uranium')
        ->weeklyOn(1, '00:29');
    Schedule::command('stats:generate coleslaw')
        ->weeklyOn(1, '00:30');
    Schedule::command('stats:generate openpk')
        ->weeklyOn(1, '00:31');
}
