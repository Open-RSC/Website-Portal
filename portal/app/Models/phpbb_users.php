<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property bool $user_type
 * @property int $group_id
 * @property string $user_permissions
 * @property int $user_perm_from
 * @property string $user_ip
 * @property int $user_regdate
 * @property string $username
 * @property string $username_clean
 * @property string $user_password
 * @property int $user_passchg
 * @property string $user_email
 * @property string $user_birthday
 * @property int $user_lastvisit
 * @property int $user_lastmark
 * @property int $user_lastpost_time
 * @property string $user_lastpage
 * @property string $user_last_confirm_key
 * @property int $user_last_search
 * @property bool $user_warnings
 * @property int $user_last_warning
 * @property bool $user_login_attempts
 * @property bool $user_inactive_reason
 * @property int $user_inactive_time
 * @property int $user_posts
 * @property string $user_lang
 * @property string $user_timezone
 * @property string $user_dateformat
 * @property int $user_style
 * @property int $user_rank
 * @property string $user_colour
 * @property int $user_new_privmsg
 * @property int $user_unread_privmsg
 * @property int $user_last_privmsg
 * @property bool $user_message_rules
 * @property int $user_full_folder
 * @property int $user_emailtime
 * @property int $user_topic_show_days
 * @property string $user_topic_sortby_type
 * @property string $user_topic_sortby_dir
 * @property int $user_post_show_days
 * @property string $user_post_sortby_type
 * @property string $user_post_sortby_dir
 * @property bool $user_notify
 * @property bool $user_notify_pm
 * @property bool $user_notify_type
 * @property bool $user_allow_pm
 * @property bool $user_allow_viewonline
 * @property bool $user_allow_viewemail
 * @property bool $user_allow_massemail
 * @property int $user_options
 * @property string $user_avatar
 * @property string $user_avatar_type
 * @property int $user_avatar_width
 * @property int $user_avatar_height
 * @property string $user_sig
 * @property string $user_sig_bbcode_uid
 * @property string $user_sig_bbcode_bitfield
 * @property string $user_jabber
 * @property string $user_actkey
 * @property string $reset_token
 * @property int $reset_token_expiration
 * @property string $user_newpasswd
 * @property string $user_form_salt
 * @property bool $user_new
 * @property bool $user_reminded
 * @property int $user_reminded_time
 */
class phpbb_users extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
    protected $fillable = ['user_type', 'group_id', 'user_permissions', 'user_perm_from', 'user_ip', 'user_regdate', 'username', 'username_clean', 'user_password', 'user_passchg', 'user_email', 'user_birthday', 'user_lastvisit', 'user_lastmark', 'user_lastpost_time', 'user_lastpage', 'user_last_confirm_key', 'user_last_search', 'user_warnings', 'user_last_warning', 'user_login_attempts', 'user_inactive_reason', 'user_inactive_time', 'user_posts', 'user_lang', 'user_timezone', 'user_dateformat', 'user_style', 'user_rank', 'user_colour', 'user_new_privmsg', 'user_unread_privmsg', 'user_last_privmsg', 'user_message_rules', 'user_full_folder', 'user_emailtime', 'user_topic_show_days', 'user_topic_sortby_type', 'user_topic_sortby_dir', 'user_post_show_days', 'user_post_sortby_type', 'user_post_sortby_dir', 'user_notify', 'user_notify_pm', 'user_notify_type', 'user_allow_pm', 'user_allow_viewonline', 'user_allow_viewemail', 'user_allow_massemail', 'user_options', 'user_avatar', 'user_avatar_type', 'user_avatar_width', 'user_avatar_height', 'user_sig', 'user_sig_bbcode_uid', 'user_sig_bbcode_bitfield', 'user_jabber', 'user_actkey', 'reset_token', 'reset_token_expiration', 'user_newpasswd', 'user_form_salt', 'user_new', 'user_reminded', 'user_reminded_time'];
}
