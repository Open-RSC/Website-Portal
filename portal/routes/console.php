<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule::command('inspire')->hourly();

Schedule::command('toplist:bi-monthly')
    ->twiceMonthly(1, 16, '12:00');

//TODO: We should probably add clean-up at some point,
//even though it's less than 1kb per CSV file so 20MB per year.
if (config('openrsc.stats_hourly_csv_job_enabled')) {
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
