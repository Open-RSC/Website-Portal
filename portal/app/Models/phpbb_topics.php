<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $topic_id
 * @property int $forum_id
 * @property int $icon_id
 * @property boolean $topic_attachment
 * @property boolean $topic_reported
 * @property string $topic_title
 * @property int $topic_poster
 * @property int $topic_time
 * @property int $topic_time_limit
 * @property int $topic_views
 * @property boolean $topic_status
 * @property boolean $topic_type
 * @property int $topic_first_post_id
 * @property string $topic_first_poster_name
 * @property string $topic_first_poster_colour
 * @property int $topic_last_post_id
 * @property int $topic_last_poster_id
 * @property string $topic_last_poster_name
 * @property string $topic_last_poster_colour
 * @property string $topic_last_post_subject
 * @property int $topic_last_post_time
 * @property int $topic_last_view_time
 * @property int $topic_moved_id
 * @property boolean $topic_bumped
 * @property int $topic_bumper
 * @property string $poll_title
 * @property int $poll_start
 * @property int $poll_length
 * @property boolean $poll_max_options
 * @property int $poll_last_vote
 * @property boolean $poll_vote_change
 * @property boolean $topic_visibility
 * @property int $topic_delete_time
 * @property string $topic_delete_reason
 * @property int $topic_delete_user
 * @property int $topic_posts_approved
 * @property int $topic_posts_unapproved
 * @property int $topic_posts_softdeleted
 */
class phpbb_topics extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'topic_id';

    /**
     * @var array
     */
    protected $fillable = ['forum_id', 'icon_id', 'topic_attachment', 'topic_reported', 'topic_title', 'topic_poster', 'topic_time', 'topic_time_limit', 'topic_views', 'topic_status', 'topic_type', 'topic_first_post_id', 'topic_first_poster_name', 'topic_first_poster_colour', 'topic_last_post_id', 'topic_last_poster_id', 'topic_last_poster_name', 'topic_last_poster_colour', 'topic_last_post_subject', 'topic_last_post_time', 'topic_last_view_time', 'topic_moved_id', 'topic_bumped', 'topic_bumper', 'poll_title', 'poll_start', 'poll_length', 'poll_max_options', 'poll_last_vote', 'poll_vote_change', 'topic_visibility', 'topic_delete_time', 'topic_delete_reason', 'topic_delete_user', 'topic_posts_approved', 'topic_posts_unapproved', 'topic_posts_softdeleted'];

}
