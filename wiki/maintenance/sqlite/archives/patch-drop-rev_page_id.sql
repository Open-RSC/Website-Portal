-- This file is automatically generated using maintenance/generateSchemaChangeSql.php.
-- Source: maintenance/abstractSchemaChanges/patch-drop-rev_page_id.json
-- Do not modify this file directly.
-- See https://www.mediawiki.org/wiki/Manual:Schema_changes
DROP  INDEX rev_page_id;
DROP  INDEX rev_timestamp;
DROP  INDEX rev_page_timestamp;
DROP  INDEX rev_actor_timestamp;
DROP  INDEX rev_page_actor_timestamp;
CREATE TEMPORARY TABLE /*_*/__temp__revision AS
SELECT  rev_id,  rev_page,  rev_comment_id,  rev_actor,  rev_timestamp,  rev_minor_edit,  rev_deleted,  rev_len,  rev_parent_id,  rev_sha1
FROM  /*_*/revision;
DROP  TABLE  /*_*/revision;
CREATE TABLE  /*_*/revision (    rev_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,    rev_page INTEGER UNSIGNED NOT NULL,    rev_comment_id BIGINT UNSIGNED DEFAULT 0 NOT NULL,    rev_actor BIGINT UNSIGNED DEFAULT 0 NOT NULL,    rev_timestamp BLOB NOT NULL, rev_minor_edit SMALLINT UNSIGNED DEFAULT 0 NOT NULL,    rev_deleted SMALLINT UNSIGNED DEFAULT 0 NOT NULL,    rev_len INTEGER UNSIGNED DEFAULT NULL,    rev_parent_id INTEGER UNSIGNED DEFAULT NULL,    rev_sha1 BLOB DEFAULT '' NOT NULL  );
INSERT INTO  /*_*/revision (    rev_id, rev_page, rev_comment_id,    rev_actor, rev_timestamp, rev_minor_edit,    rev_deleted, rev_len, rev_parent_id,    rev_sha1  )
SELECT  rev_id,  rev_page,  rev_comment_id,  rev_actor,  rev_timestamp,  rev_minor_edit,  rev_deleted,  rev_len,  rev_parent_id,  rev_sha1
FROM  /*_*/__temp__revision;
DROP  TABLE /*_*/__temp__revision;
CREATE INDEX rev_timestamp ON  /*_*/revision (rev_timestamp);
CREATE INDEX rev_page_timestamp ON  /*_*/revision (rev_page, rev_timestamp);
CREATE INDEX rev_actor_timestamp ON  /*_*/revision (rev_actor, rev_timestamp, rev_id);
CREATE INDEX rev_page_actor_timestamp ON  /*_*/revision (    rev_page, rev_actor, rev_timestamp  );