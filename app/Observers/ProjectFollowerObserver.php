<?php

namespace App\Observers;

use App\Models\ProjectFollower;

class ProjectFollowerObserver
{
    /**
     * Handle the project follower "created" event.
     *
     * @param  \App\Models\ProjectFollower  $projectFollower
     * @return void
     */
    public function created(ProjectFollower $projectFollower)
    {
        //
    }

    /**
     * Handle the project follower "updated" event.
     *
     * @param  \App\Models\ProjectFollower  $projectFollower
     * @return void
     */
    public function updated(ProjectFollower $projectFollower)
    {
        //
    }

    /**
     * Handle the project follower "deleted" event.
     *
     * @param  \App\Models\ProjectFollower  $projectFollower
     * @return void
     */
    public function deleted(ProjectFollower $projectFollower)
    {
        //
    }

    /**
     * Handle the project follower "restored" event.
     *
     * @param  \App\Models\ProjectFollower  $projectFollower
     * @return void
     */
    public function restored(ProjectFollower $projectFollower)
    {
        //
    }

    /**
     * Handle the project follower "force deleted" event.
     *
     * @param  \App\Models\ProjectFollower  $projectFollower
     * @return void
     */
    public function forceDeleted(ProjectFollower $projectFollower)
    {
        //
    }
}
