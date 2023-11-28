<?php

namespace App\Observers;

use App\Models\TaskAttachment;

class TaskAttachmentObserver
{
    /**
     * Handle the task attachment "created" event.
     *
     * @param  \App\Models\TaskAttachment  $taskAttachment
     * @return void
     */
    public function created(TaskAttachment $taskAttachment)
    {
        //
    }

    /**
     * Handle the task attachment "updated" event.
     *
     * @param  \App\Models\TaskAttachment  $taskAttachment
     * @return void
     */
    public function updated(TaskAttachment $taskAttachment)
    {
        //
    }

    /**
     * Handle the task attachment "deleted" event.
     *
     * @param  \App\Models\TaskAttachment  $taskAttachment
     * @return void
     */
    public function deleted(TaskAttachment $taskAttachment)
    {
        //
    }

    /**
     * Handle the task attachment "restored" event.
     *
     * @param  \App\Models\TaskAttachment  $taskAttachment
     * @return void
     */
    public function restored(TaskAttachment $taskAttachment)
    {
        //
    }

    /**
     * Handle the task attachment "force deleted" event.
     *
     * @param  \App\Models\TaskAttachment  $taskAttachment
     * @return void
     */
    public function forceDeleted(TaskAttachment $taskAttachment)
    {
        //
    }
}
