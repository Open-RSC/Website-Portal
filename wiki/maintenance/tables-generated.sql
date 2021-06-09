-- This file is automatically generated using maintenance/generateSchemaSql.php.
-- Source: maintenance/tables.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
CREATE TABLE /*_*/site_identifiers (
  si_type VARBINARY(32) NOT NULL,
  si_key VARBINARY(32) NOT NULL,
  si_site INT UNSIGNED NOT NULL,
  INDEX si_site (si_site),
  INDEX si_key (si_key),
  PRIMARY KEY(si_type, si_key)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/updatelog (
  ul_key VARCHAR(255) NOT NULL,
  ul_value BLOB DEFAULT NULL,
  PRIMARY KEY(ul_key)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/actor (
  actor_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
  actor_user INT UNSIGNED DEFAULT NULL,
  actor_name VARBINARY(255) NOT NULL,
  UNIQUE INDEX actor_user (actor_user),
  UNIQUE INDEX actor_name (actor_name),
  PRIMARY KEY(actor_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/user_former_groups (
  ufg_user INT UNSIGNED DEFAULT 0 NOT NULL,
  ufg_group VARBINARY(255) DEFAULT '' NOT NULL,
  PRIMARY KEY(ufg_user, ufg_group)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/bot_passwords (
  bp_user INT UNSIGNED NOT NULL,
  bp_app_id VARBINARY(32) NOT NULL,
  bp_password TINYBLOB NOT NULL,
  bp_token BINARY(32) DEFAULT '' NOT NULL,
  bp_restrictions BLOB NOT NULL,
  bp_grants BLOB NOT NULL,
  PRIMARY KEY(bp_user, bp_app_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/comment (
  comment_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
  comment_hash INT NOT NULL,
  comment_text BLOB NOT NULL,
  comment_data BLOB DEFAULT NULL,
  INDEX comment_hash (comment_hash),
  PRIMARY KEY(comment_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/slots (
  slot_revision_id BIGINT UNSIGNED NOT NULL,
  slot_role_id SMALLINT UNSIGNED NOT NULL,
  slot_content_id BIGINT UNSIGNED NOT NULL,
  slot_origin BIGINT UNSIGNED NOT NULL,
  INDEX slot_revision_origin_role (
    slot_revision_id, slot_origin, slot_role_id
  ),
  PRIMARY KEY(slot_revision_id, slot_role_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/site_stats (
  ss_row_id INT UNSIGNED NOT NULL,
  ss_total_edits BIGINT UNSIGNED DEFAULT NULL,
  ss_good_articles BIGINT UNSIGNED DEFAULT NULL,
  ss_total_pages BIGINT UNSIGNED DEFAULT NULL,
  ss_users BIGINT UNSIGNED DEFAULT NULL,
  ss_active_users BIGINT UNSIGNED DEFAULT NULL,
  ss_images BIGINT UNSIGNED DEFAULT NULL,
  PRIMARY KEY(ss_row_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/user_properties (
  up_user INT UNSIGNED NOT NULL,
  up_property VARBINARY(255) NOT NULL,
  up_value BLOB DEFAULT NULL,
  INDEX up_property (up_property),
  PRIMARY KEY(up_user, up_property)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/log_search (
  ls_field VARBINARY(32) NOT NULL,
  ls_value VARCHAR(255) NOT NULL,
  ls_log_id INT UNSIGNED DEFAULT 0 NOT NULL,
  INDEX ls_log_id (ls_log_id),
  PRIMARY KEY(ls_field, ls_value, ls_log_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/change_tag (
  ct_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  ct_rc_id INT UNSIGNED DEFAULT NULL,
  ct_log_id INT UNSIGNED DEFAULT NULL,
  ct_rev_id INT UNSIGNED DEFAULT NULL,
  ct_params BLOB DEFAULT NULL,
  ct_tag_id INT UNSIGNED NOT NULL,
  UNIQUE INDEX change_tag_rc_tag_id (ct_rc_id, ct_tag_id),
  UNIQUE INDEX change_tag_log_tag_id (ct_log_id, ct_tag_id),
  UNIQUE INDEX change_tag_rev_tag_id (ct_rev_id, ct_tag_id),
  INDEX change_tag_tag_id_id (
    ct_tag_id, ct_rc_id, ct_rev_id, ct_log_id
  ),
  PRIMARY KEY(ct_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/content (
  content_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
  content_size INT UNSIGNED NOT NULL,
  content_sha1 VARBINARY(32) NOT NULL,
  content_model SMALLINT UNSIGNED NOT NULL,
  content_address VARBINARY(255) NOT NULL,
  PRIMARY KEY(content_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/l10n_cache (
  lc_lang VARBINARY(35) NOT NULL,
  lc_key VARCHAR(255) NOT NULL,
  lc_value MEDIUMBLOB NOT NULL,
  PRIMARY KEY(lc_lang, lc_key)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/module_deps (
  md_module VARBINARY(255) NOT NULL,
  md_skin VARBINARY(32) NOT NULL,
  md_deps MEDIUMBLOB NOT NULL,
  PRIMARY KEY(md_module, md_skin)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/redirect (
  rd_from INT UNSIGNED DEFAULT 0 NOT NULL,
  rd_namespace INT DEFAULT 0 NOT NULL,
  rd_title VARBINARY(255) DEFAULT '' NOT NULL,
  rd_interwiki VARCHAR(32) DEFAULT NULL,
  rd_fragment VARBINARY(255) DEFAULT NULL,
  INDEX rd_ns_title (rd_namespace, rd_title, rd_from),
  PRIMARY KEY(rd_from)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/pagelinks (
  pl_from INT UNSIGNED DEFAULT 0 NOT NULL,
  pl_namespace INT DEFAULT 0 NOT NULL,
  pl_title VARBINARY(255) DEFAULT '' NOT NULL,
  pl_from_namespace INT DEFAULT 0 NOT NULL,
  INDEX pl_namespace (pl_namespace, pl_title, pl_from),
  INDEX pl_backlinks_namespace (
    pl_from_namespace, pl_namespace,
    pl_title, pl_from
  ),
  PRIMARY KEY(pl_from, pl_namespace, pl_title)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/templatelinks (
  tl_from INT UNSIGNED DEFAULT 0 NOT NULL,
  tl_namespace INT DEFAULT 0 NOT NULL,
  tl_title VARBINARY(255) DEFAULT '' NOT NULL,
  tl_from_namespace INT DEFAULT 0 NOT NULL,
  INDEX tl_namespace (tl_namespace, tl_title, tl_from),
  INDEX tl_backlinks_namespace (
    tl_from_namespace, tl_namespace,
    tl_title, tl_from
  ),
  PRIMARY KEY(tl_from, tl_namespace, tl_title)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/imagelinks (
  il_from INT UNSIGNED DEFAULT 0 NOT NULL,
  il_to VARBINARY(255) DEFAULT '' NOT NULL,
  il_from_namespace INT DEFAULT 0 NOT NULL,
  INDEX il_to (il_to, il_from),
  INDEX il_backlinks_namespace (
    il_from_namespace, il_to, il_from
  ),
  PRIMARY KEY(il_from, il_to)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/langlinks (
  ll_from INT UNSIGNED DEFAULT 0 NOT NULL,
  ll_lang VARBINARY(35) DEFAULT '' NOT NULL,
  ll_title VARBINARY(255) DEFAULT '' NOT NULL,
  INDEX ll_lang (ll_lang, ll_title),
  PRIMARY KEY(ll_from, ll_lang)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/iwlinks (
  iwl_from INT UNSIGNED DEFAULT 0 NOT NULL,
  iwl_prefix VARBINARY(32) DEFAULT '' NOT NULL,
  iwl_title VARBINARY(255) DEFAULT '' NOT NULL,
  INDEX iwl_prefix_title_from (iwl_prefix, iwl_title, iwl_from),
  INDEX iwl_prefix_from_title (iwl_prefix, iwl_from, iwl_title),
  PRIMARY KEY(iwl_from, iwl_prefix, iwl_title)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/category (
  cat_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  cat_title VARBINARY(255) NOT NULL,
  cat_pages INT DEFAULT 0 NOT NULL,
  cat_subcats INT DEFAULT 0 NOT NULL,
  cat_files INT DEFAULT 0 NOT NULL,
  UNIQUE INDEX cat_title (cat_title),
  INDEX cat_pages (cat_pages),
  PRIMARY KEY(cat_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/watchlist_expiry (
  we_item INT UNSIGNED NOT NULL,
  we_expiry BINARY(14) NOT NULL,
  INDEX we_expiry (we_expiry),
  PRIMARY KEY(we_item)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/change_tag_def (
  ctd_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  ctd_name VARBINARY(255) NOT NULL,
  ctd_user_defined TINYINT(1) NOT NULL,
  ctd_count BIGINT UNSIGNED DEFAULT 0 NOT NULL,
  UNIQUE INDEX ctd_name (ctd_name),
  INDEX ctd_count (ctd_count),
  INDEX ctd_user_defined (ctd_user_defined),
  PRIMARY KEY(ctd_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/ipblocks_restrictions (
  ir_ipb_id INT NOT NULL,
  ir_type TINYINT(4) NOT NULL,
  ir_value INT NOT NULL,
  INDEX ir_type_value (ir_type, ir_value),
  PRIMARY KEY(ir_ipb_id, ir_type, ir_value)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/querycache (
  qc_type VARBINARY(32) NOT NULL,
  qc_value INT UNSIGNED DEFAULT 0 NOT NULL,
  qc_namespace INT DEFAULT 0 NOT NULL,
  qc_title VARBINARY(255) DEFAULT '' NOT NULL,
  INDEX qc_type (qc_type, qc_value)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/querycachetwo (
  qcc_type VARBINARY(32) NOT NULL,
  qcc_value INT UNSIGNED DEFAULT 0 NOT NULL,
  qcc_namespace INT DEFAULT 0 NOT NULL,
  qcc_title VARBINARY(255) DEFAULT '' NOT NULL,
  qcc_namespacetwo INT DEFAULT 0 NOT NULL,
  qcc_titletwo VARBINARY(255) DEFAULT '' NOT NULL,
  INDEX qcc_type (qcc_type, qcc_value),
  INDEX qcc_title (
    qcc_type, qcc_namespace, qcc_title
  ),
  INDEX qcc_titletwo (
    qcc_type, qcc_namespacetwo, qcc_titletwo
  )
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/page_restrictions (
  pr_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  pr_page INT NOT NULL,
  pr_type VARBINARY(60) NOT NULL,
  pr_level VARBINARY(60) NOT NULL,
  pr_cascade TINYINT NOT NULL,
  pr_user INT UNSIGNED DEFAULT NULL,
  pr_expiry VARBINARY(14) DEFAULT NULL,
  UNIQUE INDEX pr_pagetype (pr_page, pr_type),
  INDEX pr_typelevel (pr_type, pr_level),
  INDEX pr_level (pr_level),
  INDEX pr_cascade (pr_cascade),
  PRIMARY KEY(pr_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/user_groups (
  ug_user INT UNSIGNED DEFAULT 0 NOT NULL,
  ug_group VARBINARY(255) DEFAULT '' NOT NULL,
  ug_expiry VARBINARY(14) DEFAULT NULL,
  INDEX ug_group (ug_group),
  INDEX ug_expiry (ug_expiry),
  PRIMARY KEY(ug_user, ug_group)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/querycache_info (
  qci_type VARBINARY(32) DEFAULT '' NOT NULL,
  qci_timestamp BINARY(14) DEFAULT '19700101000000' NOT NULL,
  PRIMARY KEY(qci_type)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/watchlist (
  wl_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  wl_user INT UNSIGNED NOT NULL,
  wl_namespace INT DEFAULT 0 NOT NULL,
  wl_title VARBINARY(255) DEFAULT '' NOT NULL,
  wl_notificationtimestamp BINARY(14) DEFAULT NULL,
  UNIQUE INDEX wl_user (wl_user, wl_namespace, wl_title),
  INDEX wl_namespace_title (wl_namespace, wl_title),
  INDEX wl_user_notificationtimestamp (
    wl_user, wl_notificationtimestamp
  ),
  PRIMARY KEY(wl_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/sites (
  site_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  site_global_key VARBINARY(64) NOT NULL,
  site_type VARBINARY(32) NOT NULL,
  site_group VARBINARY(32) NOT NULL,
  site_source VARBINARY(32) NOT NULL,
  site_language VARBINARY(35) NOT NULL,
  site_protocol VARBINARY(32) NOT NULL,
  site_domain VARCHAR(255) NOT NULL,
  site_data BLOB NOT NULL,
  site_forward TINYINT(1) NOT NULL,
  site_config BLOB NOT NULL,
  UNIQUE INDEX site_global_key (site_global_key),
  INDEX site_type (site_type),
  INDEX site_group (site_group),
  INDEX site_source (site_source),
  INDEX site_language (site_language),
  INDEX site_protocol (site_protocol),
  INDEX site_domain (site_domain),
  INDEX site_forward (site_forward),
  PRIMARY KEY(site_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/user_newtalk (
  user_id INT UNSIGNED DEFAULT 0 NOT NULL,
  user_ip VARBINARY(40) DEFAULT '' NOT NULL,
  user_last_timestamp BINARY(14) DEFAULT NULL,
  INDEX un_user_id (user_id),
  INDEX un_user_ip (user_ip)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/interwiki (
  iw_prefix VARCHAR(32) NOT NULL,
  iw_url BLOB NOT NULL,
  iw_api BLOB NOT NULL,
  iw_wikiid VARCHAR(64) NOT NULL,
  iw_local TINYINT(1) NOT NULL,
  iw_trans TINYINT DEFAULT 0 NOT NULL,
  PRIMARY KEY(iw_prefix)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/protected_titles (
  pt_namespace INT NOT NULL,
  pt_title VARBINARY(255) NOT NULL,
  pt_user INT UNSIGNED NOT NULL,
  pt_reason_id BIGINT UNSIGNED NOT NULL,
  pt_timestamp BINARY(14) NOT NULL,
  pt_expiry VARBINARY(14) NOT NULL,
  pt_create_perm VARBINARY(60) NOT NULL,
  INDEX pt_timestamp (pt_timestamp),
  PRIMARY KEY(pt_namespace, pt_title)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/externallinks (
  el_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  el_from INT UNSIGNED DEFAULT 0 NOT NULL,
  el_to BLOB NOT NULL,
  el_index BLOB NOT NULL,
  el_index_60 VARBINARY(60) NOT NULL,
  INDEX el_from (
    el_from,
    el_to(40)
  ),
  INDEX el_to (
    el_to(60),
    el_from
  ),
  INDEX el_index (
    el_index(60)
  ),
  INDEX el_index_60 (el_index_60, el_id),
  INDEX el_from_index_60 (el_from, el_index_60, el_id),
  PRIMARY KEY(el_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/ip_changes (
  ipc_rev_id INT UNSIGNED DEFAULT 0 NOT NULL,
  ipc_rev_timestamp BINARY(14) NOT NULL,
  ipc_hex VARBINARY(35) DEFAULT '' NOT NULL,
  INDEX ipc_rev_timestamp (ipc_rev_timestamp),
  INDEX ipc_hex_time (ipc_hex, ipc_rev_timestamp),
  PRIMARY KEY(ipc_rev_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/revision_comment_temp (
  revcomment_rev INT UNSIGNED NOT NULL,
  revcomment_comment_id BIGINT UNSIGNED NOT NULL,
  UNIQUE INDEX revcomment_rev (revcomment_rev),
  PRIMARY KEY(
    revcomment_rev, revcomment_comment_id
  )
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/revision_actor_temp (
  revactor_rev INT UNSIGNED NOT NULL,
  revactor_actor BIGINT UNSIGNED NOT NULL,
  revactor_timestamp BINARY(14) NOT NULL,
  revactor_page INT UNSIGNED NOT NULL,
  UNIQUE INDEX revactor_rev (revactor_rev),
  INDEX actor_timestamp (
    revactor_actor, revactor_timestamp
  ),
  INDEX page_actor_timestamp (
    revactor_page, revactor_actor, revactor_timestamp
  ),
  PRIMARY KEY(revactor_rev, revactor_actor)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/page_props (
  pp_page INT NOT NULL,
  pp_propname VARBINARY(60) NOT NULL,
  pp_value BLOB NOT NULL,
  pp_sortkey FLOAT DEFAULT NULL,
  UNIQUE INDEX pp_propname_page (pp_propname, pp_page),
  UNIQUE INDEX pp_propname_sortkey_page (pp_propname, pp_sortkey, pp_page),
  PRIMARY KEY(pp_page, pp_propname)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/job (
  job_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  job_cmd VARBINARY(60) DEFAULT '' NOT NULL,
  job_namespace INT NOT NULL,
  job_title VARBINARY(255) NOT NULL,
  job_timestamp BINARY(14) DEFAULT NULL,
  job_params MEDIUMBLOB NOT NULL,
  job_random INT UNSIGNED DEFAULT 0 NOT NULL,
  job_attempts INT UNSIGNED DEFAULT 0 NOT NULL,
  job_token VARBINARY(32) DEFAULT '' NOT NULL,
  job_token_timestamp BINARY(14) DEFAULT NULL,
  job_sha1 VARBINARY(32) DEFAULT '' NOT NULL,
  INDEX job_sha1 (job_sha1),
  INDEX job_cmd_token (job_cmd, job_token, job_random),
  INDEX job_cmd_token_id (job_cmd, job_token, job_id),
  INDEX job_cmd (
    job_cmd,
    job_namespace,
    job_title,
    job_params(128)
  ),
  INDEX job_timestamp (job_timestamp),
  PRIMARY KEY(job_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/slot_roles (
  role_id INT AUTO_INCREMENT NOT NULL,
  role_name VARBINARY(64) NOT NULL,
  UNIQUE INDEX role_name (role_name),
  PRIMARY KEY(role_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/content_models (
  model_id INT AUTO_INCREMENT NOT NULL,
  model_name VARBINARY(64) NOT NULL,
  UNIQUE INDEX model_name (model_name),
  PRIMARY KEY(model_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/categorylinks (
  cl_from INT UNSIGNED DEFAULT 0 NOT NULL,
  cl_to VARBINARY(255) DEFAULT '' NOT NULL,
  cl_sortkey VARBINARY(230) DEFAULT '' NOT NULL,
  cl_sortkey_prefix VARBINARY(255) DEFAULT '' NOT NULL,
  cl_timestamp TIMESTAMP NOT NULL,
  cl_collation VARBINARY(32) DEFAULT '' NOT NULL,
  cl_type ENUM('page', 'subcat', 'file') DEFAULT 'page' NOT NULL,
  INDEX cl_sortkey (
    cl_to, cl_type, cl_sortkey, cl_from
  ),
  INDEX cl_timestamp (cl_to, cl_timestamp),
  INDEX cl_collation_ext (
    cl_collation, cl_to, cl_type, cl_from
  ),
  PRIMARY KEY(cl_from, cl_to)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/logging (
  log_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  log_type VARBINARY(32) DEFAULT '' NOT NULL,
  log_action VARBINARY(32) DEFAULT '' NOT NULL,
  log_timestamp BINARY(14) DEFAULT '19700101000000' NOT NULL,
  log_actor BIGINT UNSIGNED NOT NULL,
  log_namespace INT DEFAULT 0 NOT NULL,
  log_title VARBINARY(255) DEFAULT '' NOT NULL,
  log_page INT UNSIGNED DEFAULT NULL,
  log_comment_id BIGINT UNSIGNED NOT NULL,
  log_params BLOB NOT NULL,
  log_deleted TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  INDEX log_type_time (log_type, log_timestamp),
  INDEX log_actor_time (log_actor, log_timestamp),
  INDEX log_page_time (
    log_namespace, log_title, log_timestamp
  ),
  INDEX log_times (log_timestamp),
  INDEX log_actor_type_time (
    log_actor, log_type, log_timestamp
  ),
  INDEX log_page_id_time (log_page, log_timestamp),
  INDEX log_type_action (
    log_type, log_action, log_timestamp
  ),
  PRIMARY KEY(log_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/uploadstash (
  us_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  us_user INT UNSIGNED NOT NULL,
  us_key VARCHAR(255) NOT NULL,
  us_orig_path VARCHAR(255) NOT NULL,
  us_path VARCHAR(255) NOT NULL,
  us_source_type VARCHAR(50) DEFAULT NULL,
  us_timestamp BINARY(14) NOT NULL,
  us_status VARCHAR(50) NOT NULL,
  us_chunk_inx INT UNSIGNED DEFAULT NULL,
  us_props BLOB DEFAULT NULL,
  us_size INT UNSIGNED NOT NULL,
  us_sha1 VARCHAR(31) NOT NULL,
  us_mime VARCHAR(255) DEFAULT NULL,
  us_media_type ENUM(
    'UNKNOWN', 'BITMAP', 'DRAWING', 'AUDIO',
    'VIDEO', 'MULTIMEDIA', 'OFFICE',
    'TEXT', 'EXECUTABLE', 'ARCHIVE',
    '3D'
  ) DEFAULT NULL,
  us_image_width INT UNSIGNED DEFAULT NULL,
  us_image_height INT UNSIGNED DEFAULT NULL,
  us_image_bits SMALLINT UNSIGNED DEFAULT NULL,
  INDEX us_user (us_user),
  UNIQUE INDEX us_key (us_key),
  INDEX us_timestamp (us_timestamp),
  PRIMARY KEY(us_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/filearchive (
  fa_id INT AUTO_INCREMENT NOT NULL,
  fa_name VARBINARY(255) DEFAULT '' NOT NULL,
  fa_archive_name VARBINARY(255) DEFAULT '',
  fa_storage_group VARBINARY(16) DEFAULT NULL,
  fa_storage_key VARBINARY(64) DEFAULT '',
  fa_deleted_user INT DEFAULT NULL,
  fa_deleted_timestamp BINARY(14) DEFAULT NULL,
  fa_deleted_reason_id BIGINT UNSIGNED NOT NULL,
  fa_size INT UNSIGNED DEFAULT 0,
  fa_width INT DEFAULT 0,
  fa_height INT DEFAULT 0,
  fa_metadata MEDIUMBLOB DEFAULT NULL,
  fa_bits INT DEFAULT 0,
  fa_media_type ENUM(
    'UNKNOWN', 'BITMAP', 'DRAWING', 'AUDIO',
    'VIDEO', 'MULTIMEDIA', 'OFFICE',
    'TEXT', 'EXECUTABLE', 'ARCHIVE',
    '3D'
  ) DEFAULT NULL,
  fa_major_mime ENUM(
    'unknown', 'application', 'audio',
    'image', 'text', 'video', 'message',
    'model', 'multipart', 'chemical'
  ) DEFAULT 'unknown',
  fa_minor_mime VARBINARY(100) DEFAULT 'unknown',
  fa_description_id BIGINT UNSIGNED NOT NULL,
  fa_actor BIGINT UNSIGNED NOT NULL,
  fa_timestamp BINARY(14) DEFAULT NULL,
  fa_deleted TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  fa_sha1 VARBINARY(32) DEFAULT '' NOT NULL,
  INDEX fa_name (fa_name, fa_timestamp),
  INDEX fa_storage_group (
    fa_storage_group, fa_storage_key
  ),
  INDEX fa_deleted_timestamp (fa_deleted_timestamp),
  INDEX fa_actor_timestamp (fa_actor, fa_timestamp),
  INDEX fa_sha1 (
    fa_sha1(10)
  ),
  PRIMARY KEY(fa_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/text (
  old_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  old_text MEDIUMBLOB NOT NULL,
  old_flags TINYBLOB NOT NULL,
  PRIMARY KEY(old_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/oldimage (
  oi_name VARBINARY(255) DEFAULT '' NOT NULL,
  oi_archive_name VARBINARY(255) DEFAULT '' NOT NULL,
  oi_size INT UNSIGNED DEFAULT 0 NOT NULL,
  oi_width INT DEFAULT 0 NOT NULL,
  oi_height INT DEFAULT 0 NOT NULL,
  oi_bits INT DEFAULT 0 NOT NULL,
  oi_description_id BIGINT UNSIGNED NOT NULL,
  oi_actor BIGINT UNSIGNED NOT NULL,
  oi_timestamp BINARY(14) NOT NULL,
  oi_metadata MEDIUMBLOB NOT NULL,
  oi_media_type ENUM(
    'UNKNOWN', 'BITMAP', 'DRAWING', 'AUDIO',
    'VIDEO', 'MULTIMEDIA', 'OFFICE',
    'TEXT', 'EXECUTABLE', 'ARCHIVE',
    '3D'
  ) DEFAULT NULL,
  oi_major_mime ENUM(
    'unknown', 'application', 'audio',
    'image', 'text', 'video', 'message',
    'model', 'multipart', 'chemical'
  ) DEFAULT 'unknown' NOT NULL,
  oi_minor_mime VARBINARY(100) DEFAULT 'unknown' NOT NULL,
  oi_deleted TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  oi_sha1 VARBINARY(32) DEFAULT '' NOT NULL,
  INDEX oi_actor_timestamp (oi_actor, oi_timestamp),
  INDEX oi_name_timestamp (oi_name, oi_timestamp),
  INDEX oi_name_archive_name (
    oi_name,
    oi_archive_name(14)
  ),
  INDEX oi_sha1 (
    oi_sha1(10)
  )
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/objectcache (
  keyname VARBINARY(255) DEFAULT '' NOT NULL,
  value MEDIUMBLOB DEFAULT NULL,
  exptime BINARY(14) NOT NULL,
  INDEX exptime (exptime),
  PRIMARY KEY(keyname)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/ipblocks (
  ipb_id INT AUTO_INCREMENT NOT NULL,
  ipb_address TINYBLOB NOT NULL,
  ipb_user INT UNSIGNED DEFAULT 0 NOT NULL,
  ipb_by_actor BIGINT UNSIGNED NOT NULL,
  ipb_reason_id BIGINT UNSIGNED NOT NULL,
  ipb_timestamp BINARY(14) NOT NULL,
  ipb_auto TINYINT(1) DEFAULT 0 NOT NULL,
  ipb_anon_only TINYINT(1) DEFAULT 0 NOT NULL,
  ipb_create_account TINYINT(1) DEFAULT 1 NOT NULL,
  ipb_enable_autoblock TINYINT(1) DEFAULT 1 NOT NULL,
  ipb_expiry VARBINARY(14) NOT NULL,
  ipb_range_start TINYBLOB NOT NULL,
  ipb_range_end TINYBLOB NOT NULL,
  ipb_deleted TINYINT(1) DEFAULT 0 NOT NULL,
  ipb_block_email TINYINT(1) DEFAULT 0 NOT NULL,
  ipb_allow_usertalk TINYINT(1) DEFAULT 0 NOT NULL,
  ipb_parent_block_id INT DEFAULT NULL,
  ipb_sitewide TINYINT(1) DEFAULT 1 NOT NULL,
  UNIQUE INDEX ipb_address_unique (
    ipb_address(255),
    ipb_user,
    ipb_auto
  ),
  INDEX ipb_user (ipb_user),
  INDEX ipb_range (
    ipb_range_start(8),
    ipb_range_end(8)
  ),
  INDEX ipb_timestamp (ipb_timestamp),
  INDEX ipb_expiry (ipb_expiry),
  INDEX ipb_parent_block_id (ipb_parent_block_id),
  PRIMARY KEY(ipb_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/image (
  img_name VARBINARY(255) DEFAULT '' NOT NULL,
  img_size INT UNSIGNED DEFAULT 0 NOT NULL,
  img_width INT DEFAULT 0 NOT NULL,
  img_height INT DEFAULT 0 NOT NULL,
  img_metadata MEDIUMBLOB NOT NULL,
  img_bits INT DEFAULT 0 NOT NULL,
  img_media_type ENUM(
    'UNKNOWN', 'BITMAP', 'DRAWING', 'AUDIO',
    'VIDEO', 'MULTIMEDIA', 'OFFICE',
    'TEXT', 'EXECUTABLE', 'ARCHIVE',
    '3D'
  ) DEFAULT NULL,
  img_major_mime ENUM(
    'unknown', 'application', 'audio',
    'image', 'text', 'video', 'message',
    'model', 'multipart', 'chemical'
  ) DEFAULT 'unknown' NOT NULL,
  img_minor_mime VARBINARY(100) DEFAULT 'unknown' NOT NULL,
  img_description_id BIGINT UNSIGNED NOT NULL,
  img_actor BIGINT UNSIGNED NOT NULL,
  img_timestamp BINARY(14) NOT NULL,
  img_sha1 VARBINARY(32) DEFAULT '' NOT NULL,
  INDEX img_actor_timestamp (img_actor, img_timestamp),
  INDEX img_size (img_size),
  INDEX img_timestamp (img_timestamp),
  INDEX img_sha1 (
    img_sha1(10)
  ),
  INDEX img_media_mime (
    img_media_type, img_major_mime, img_minor_mime
  ),
  PRIMARY KEY(img_name)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/recentchanges (
  rc_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  rc_timestamp BINARY(14) NOT NULL,
  rc_actor BIGINT UNSIGNED NOT NULL,
  rc_namespace INT DEFAULT 0 NOT NULL,
  rc_title VARBINARY(255) DEFAULT '' NOT NULL,
  rc_comment_id BIGINT UNSIGNED NOT NULL,
  rc_minor TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  rc_bot TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  rc_new TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  rc_cur_id INT UNSIGNED DEFAULT 0 NOT NULL,
  rc_this_oldid INT UNSIGNED DEFAULT 0 NOT NULL,
  rc_last_oldid INT UNSIGNED DEFAULT 0 NOT NULL,
  rc_type TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  rc_source VARBINARY(16) DEFAULT '' NOT NULL,
  rc_patrolled TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  rc_ip VARBINARY(40) DEFAULT '' NOT NULL,
  rc_old_len INT DEFAULT NULL,
  rc_new_len INT DEFAULT NULL,
  rc_deleted TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  rc_logid INT UNSIGNED DEFAULT 0 NOT NULL,
  rc_log_type VARBINARY(255) DEFAULT NULL,
  rc_log_action VARBINARY(255) DEFAULT NULL,
  rc_params BLOB DEFAULT NULL,
  INDEX rc_timestamp (rc_timestamp),
  INDEX rc_namespace_title_timestamp (
    rc_namespace, rc_title, rc_timestamp
  ),
  INDEX rc_cur_id (rc_cur_id),
  INDEX rc_new_name_timestamp (
    rc_new, rc_namespace, rc_timestamp
  ),
  INDEX rc_ip (rc_ip),
  INDEX rc_ns_actor (rc_namespace, rc_actor),
  INDEX rc_actor (rc_actor, rc_timestamp),
  INDEX rc_name_type_patrolled_timestamp (
    rc_namespace, rc_type, rc_patrolled,
    rc_timestamp
  ),
  INDEX rc_this_oldid (rc_this_oldid),
  PRIMARY KEY(rc_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/archive (
  ar_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  ar_namespace INT DEFAULT 0 NOT NULL,
  ar_title VARBINARY(255) DEFAULT '' NOT NULL,
  ar_comment_id BIGINT UNSIGNED NOT NULL,
  ar_actor BIGINT UNSIGNED NOT NULL,
  ar_timestamp BINARY(14) NOT NULL,
  ar_minor_edit TINYINT DEFAULT 0 NOT NULL,
  ar_rev_id INT UNSIGNED NOT NULL,
  ar_deleted TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  ar_len INT UNSIGNED DEFAULT NULL,
  ar_page_id INT UNSIGNED DEFAULT NULL,
  ar_parent_id INT UNSIGNED DEFAULT NULL,
  ar_sha1 VARBINARY(32) DEFAULT '' NOT NULL,
  INDEX ar_name_title_timestamp (
    ar_namespace, ar_title, ar_timestamp
  ),
  INDEX ar_actor_timestamp (ar_actor, ar_timestamp),
  UNIQUE INDEX ar_revid_uniq (ar_rev_id),
  PRIMARY KEY(ar_id)
) /*$wgDBTableOptions*/;


CREATE TABLE /*_*/page (
  page_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  page_namespace INT NOT NULL,
  page_title VARBINARY(255) NOT NULL,
  page_restrictions TINYBLOB DEFAULT NULL,
  page_is_redirect TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  page_is_new TINYINT UNSIGNED DEFAULT 0 NOT NULL,
  page_random DOUBLE PRECISION UNSIGNED NOT NULL,
  page_touched BINARY(14) NOT NULL,
  page_links_updated VARBINARY(14) DEFAULT NULL,
  page_latest INT UNSIGNED NOT NULL,
  page_len INT UNSIGNED NOT NULL,
  page_content_model VARBINARY(32) DEFAULT NULL,
  page_lang VARBINARY(35) DEFAULT NULL,
  UNIQUE INDEX name_title (page_namespace, page_title),
  INDEX page_random (page_random),
  INDEX page_len (page_len),
  INDEX page_redirect_namespace_len (
    page_is_redirect, page_namespace,
    page_len
  ),
  PRIMARY KEY(page_id)
) /*$wgDBTableOptions*/;
