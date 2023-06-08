<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $post_id
 * @property int $topic_id
 * @property int $forum_id
 * @property int $poster_id
 * @property int $icon_id
 * @property string $poster_ip
 * @property int $post_time
 * @property bool $post_reported
 * @property bool $enable_bbcode
 * @property bool $enable_smilies
 * @property bool $enable_magic_url
 * @property bool $enable_sig
 * @property string $post_username
 * @property string $post_subject
 * @property string $post_text
 * @property string $post_checksum
 * @property bool $post_attachment
 * @property string $bbcode_bitfield
 * @property string $bbcode_uid
 * @property bool $post_postcount
 * @property int $post_edit_time
 * @property string $post_edit_reason
 * @property int $post_edit_user
 * @property int $post_edit_count
 * @property bool $post_edit_locked
 * @property bool $post_visibility
 * @property int $post_delete_time
 * @property string $post_delete_reason
 * @property int $post_delete_user
 */
class phpbb_posts extends phpbb_topics
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'post_id';

    /**
     * @var array
     */
    protected $fillable = ['topic_id', 'forum_id', 'poster_id', 'icon_id', 'poster_ip', 'post_time', 'post_reported', 'enable_bbcode', 'enable_smilies', 'enable_magic_url', 'enable_sig', 'post_username', 'post_subject', 'post_text', 'post_checksum', 'post_attachment', 'bbcode_bitfield', 'bbcode_uid', 'post_postcount', 'post_edit_time', 'post_edit_reason', 'post_edit_user', 'post_edit_count', 'post_edit_locked', 'post_visibility', 'post_delete_time', 'post_delete_reason', 'post_delete_user'];

    protected $dateFormat = 'U';

    //protected $connection = 'connection-name';
}
