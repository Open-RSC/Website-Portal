<?php

return [
    'stats_page_generates_csv' => env('STATS_PAGE_GENERATES_CSV', false),
    'stats_hourly_job_enabled' => env('STATS_HOURLY_CSV_JOB_ENABLED', false),
    'stats_hourly_csv_job_enabled' => env('STATS_HOURLY_JOB_ENABLED', false),
    'stats_page_enabled' => env('STATS_PAGE_ENABLED', true),
    'force_https' => env('FORCE_HTTPS', false),
    'gpg_private_key_file' => env('GPG_PRIVATE_KEY_FILE', ''),
    'gpg_public_key_file' => env('GPG_PUBLIC_KEY_FILE', ''),
    'player_exports_enabled' => env('PLAYER_EXPORTS_ENABLED', false),
    'player_exports_api_enabled' => env('PLAYER_EXPORTS_API_ENABLED', false),
    'player_exports_admin_only' => env('PLAYER_EXPORTS_ADMIN_ONLY', false),
    'player_exports_moderator_only' => env('PLAYER_EXPORTS_MODERATOR_ONLY', false),
    'login_enabled' => env('LOGIN_ENABLED', true),
    'login_admin_only' => env('LOGIN_ADMIN_ONLY', false),
    'board_enabled' => env('BOARD_ENABLED', true),
    'web_registration_enabled' => env('WEB_REGISTRATION_ENABLED', false),
    'max_new_accounts_per_24_hours' => env('MAX_NEW_ACCOUNTS_PER_24_HOURS', 3),
    'npc_hiscores_enabled' => env('NPC_HISCORES_ENABLED', false),
    'discord_url' => env('DISCORD_URL', 'https://discord.gg/ABdFCqn'),
    'discord_url_on_maintenance_page' => env('DISCORD_URL_ON_MAINTENANCE_PAGE', false)
];
