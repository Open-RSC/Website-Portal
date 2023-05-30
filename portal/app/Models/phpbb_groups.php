<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $group_id
 * @property bool $group_type
 * @property bool $group_founder_manage
 * @property bool $group_skip_auth
 * @property string $group_name
 * @property string $group_desc
 * @property string $group_desc_bitfield
 * @property int $group_desc_options
 * @property string $group_desc_uid
 * @property bool $group_display
 * @property string $group_avatar
 * @property string $group_avatar_type
 * @property int $group_avatar_width
 * @property int $group_avatar_height
 * @property int $group_rank
 * @property string $group_colour
 * @property int $group_sig_chars
 * @property bool $group_receive_pm
 * @property int $group_message_limit
 * @property int $group_legend
 * @property int $group_max_recipients
 */
class phpbb_groups extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'group_id';

    /**
     * @var array
     */
    protected $fillable = ['group_type', 'group_founder_manage', 'group_skip_auth', 'group_name', 'group_desc', 'group_desc_bitfield', 'group_desc_options', 'group_desc_uid', 'group_display', 'group_avatar', 'group_avatar_type', 'group_avatar_width', 'group_avatar_height', 'group_rank', 'group_colour', 'group_sig_chars', 'group_receive_pm', 'group_message_limit', 'group_legend', 'group_max_recipients'];
}
