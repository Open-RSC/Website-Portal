<?php

return [
    "stats_page_generates_csv" => env("STATS_PAGE_GENERATES_CSV", false),
    "stats_hourly_job_enabled" => env("STATS_HOURLY_CSV_JOB_ENABLED", false),
    "stats_hourly_csv_job_enabled" => env("STATS_HOURLY_JOB_ENABLED", false),
    "stats_page_enabled" => env("STATS_PAGE_ENABLED", true),
    "force_https" => env("FORCE_HTTPS", false),
    "gpg_private_key_file" => env("GPG_PRIVATE_KEY_FILE", ""),
    "gpg_public_key_file" => env("GPG_PUBLIC_KEY_FILE", ""),
    "player_exports_enabled" => env("PLAYER_EXPORTS_ENABLED", false),
    "player_exports_admin_only" => env("PLAYER_EXPORTS_ADMIN_ONLY", false),
    "player_exports_moderator_only" => env("PLAYER_EXPORTS_MODERATOR_ONLY", false),
    "login_enabled" => env("LOGIN_ENABLED", true),
    "login_admin_only" => env("LOGIN_ADMIN_ONLY", false),
    "board_enabled" => env("BOARD_ENABLED", true)
];