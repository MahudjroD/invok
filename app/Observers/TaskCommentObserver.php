<?php

namespace App\Observers;

use App\Models\TaskComment;

class TaskCommentObserver
{
    /**
     * Handle the task comment "created" event.
     *
     * @param  \App\Models\TaskComment  $taskComment
     * @return void
     */
    public function created(TaskComment $taskComment)
    {
        //
    }

    /**
     * Handle the task comment "updated" event.
     *
     * @param  \App\Models\TaskComment  $taskComment
     * @return void
     */
    public function updated(TaskComment $taskComment)
    {
        //
    }

    /**
     * Handle the task comment "deleted" event.
     *
     * @param  \App\Models\TaskComment  $taskComment
     * @return void
     */
    public function deleted(TaskComment $taskComment)
    {
        //
    }

    /**
     * Handle the task comment "restored" event.
     *
     * @param  \App\Models\TaskComment  $taskComment
     * @return void
     */
    public function restored(TaskComment $taskComment)
    {
        //
    }

    /**
     * Handle the task comment "force deleted" event.
     *
     * @param  \App\Models\TaskComment  $taskComment
     * @return void
     */
    public function forceDeleted(TaskComment $taskComment)
    {
        //
    }
}
