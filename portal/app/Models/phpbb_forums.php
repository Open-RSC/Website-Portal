<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $forum_id
 * @property int $parent_id
 * @property int $left_id
 * @property int $right_id
 * @property string $forum_parents
 * @property string $forum_name
 * @property string $forum_desc
 * @property string $forum_desc_bitfield
 * @property int $forum_desc_options
 * @property string $forum_desc_uid
 * @property string $forum_link
 * @property string $forum_password
 * @property int $forum_style
 * @property string $forum_image
 * @property string $forum_rules
 * @property string $forum_rules_link
 * @property string $forum_rules_bitfield
 * @property int $forum_rules_options
 * @property string $forum_rules_uid
 * @property integer $forum_topics_per_page
 * @property boolean $forum_type
 * @property boolean $forum_status
 * @property int $forum_last_post_id
 * @property int $forum_last_poster_id
 * @property string $forum_last_post_subject
 * @property int $forum_last_post_time
 * @property string $forum_last_poster_name
 * @property string $forum_last_poster_colour
 * @property boolean $forum_flags
 * @property boolean $display_on_index
 * @property boolean $enable_indexing
 * @property boolean $enable_icons
 * @property boolean $enable_prune
 * @property int $prune_next
 * @property int $prune_days
 * @property int $prune_viewed
 * @property int $prune_freq
 * @property boolean $display_subforum_list
 * @property boolean $display_subforum_limit
 * @property int $forum_options
 * @property int $forum_posts_approved
 * @property int $forum_posts_unapproved
 * @property int $forum_posts_softdeleted
 * @property int $forum_topics_approved
 * @property int $forum_topics_unapproved
 * @property int $forum_topics_softdeleted
 * @property boolean $enable_shadow_prune
 * @property int $prune_shadow_days
 * @property int $prune_shadow_freq
 * @property int $prune_shadow_next
 */
class phpbb_forums extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'forum_id';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'left_id', 'right_id', 'forum_parents', 'forum_name', 'forum_desc', 'forum_desc_bitfield', 'forum_desc_options', 'forum_desc_uid', 'forum_link', 'forum_password', 'forum_style', 'forum_image', 'forum_rules', 'forum_rules_link', 'forum_rules_bitfield', 'forum_rules_options', 'forum_rules_uid', 'forum_topics_per_page', 'forum_type', 'forum_status', 'forum_last_post_id', 'forum_last_poster_id', 'forum_last_post_subject', 'forum_last_post_time', 'forum_last_poster_name', 'forum_last_poster_colour', 'forum_flags', 'display_on_index', 'enable_indexing', 'enable_icons', 'enable_prune', 'prune_next', 'prune_days', 'prune_viewed', 'prune_freq', 'display_subforum_list', 'display_subforum_limit', 'forum_options', 'forum_posts_approved', 'forum_posts_unapproved', 'forum_posts_softdeleted', 'forum_topics_approved', 'forum_topics_unapproved', 'forum_topics_softdeleted', 'enable_shadow_prune', 'prune_shadow_days', 'prune_shadow_freq', 'prune_shadow_next'];

}
