<?php

return [
    "stats_page_generates_csv" => env("STATS_PAGE_GENERATES_CSV", false),
    "stats_hourly_job_enabled" => env("STATS_HOURLY_CSV_JOB_ENABLED", false),
    "stats_hourly_csv_job_enabled" => env("STATS_HOURLY_JOB_ENABLED", false),
    "stats_page_enabled" => env("STATS_PAGE_ENABLED", true),
    "force_https" => env("FORCE_HTTPS", false)
];