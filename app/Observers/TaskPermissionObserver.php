<?php

namespace App\Observers;

use App\Models\TaskPermission;

class TaskPermissionObserver
{
    /**
     * Handle the task follower "created" event.
     *
     * @param  \App\Models\TaskPermission  $taskPermission
     * @return void
     */
    public function created(TaskPermission $taskPermission)
    {
        //
    }

    /**
     * Handle the task follower "updated" event.
     *
     * @param  \App\Models\TaskPermission  $taskPermission
     * @return void
     */
    public function updated(TaskPermission  $taskPermission)
    {
        //
    }

    /**
     * Handle the task follower "deleted" event.
     *
     * @param  \App\Models\TaskPermission  $taskPermission
     * @return void
     */
    public function deleted(TaskPermission  $taskPermission)
    {
        //
    }

    /**
     * Handle the task follower "restored" event.
     *
     * @param  \App\Models\TaskPermission  $taskPermission
     * @return void
     */
    public function restored(TaskPermission  $taskPermission)
    {
        //
    }

    /**
     * Handle the task follower "force deleted" event.
     *
     * @param  \App\Models\TaskPermission  $taskPermission
     * @return void
     */
    public function forceDeleted(TaskPermission  $taskPermission)
    {
        //
    }
}
