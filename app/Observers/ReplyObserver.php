<?php

namespace App\Observers;

use App\Models\Reply;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class ReplyObserver
{
    public function created(Reply $reply )
    {
        // $reply->topic->increment('reply_count', 1);



        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
    }

    public function saving(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }
}
