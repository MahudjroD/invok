<?php

namespace App\Observers;

use App\Models\EventGuest;

class EventGuestObserver
{
    /**
     * Handle the event guest "created" event.
     *
     * @param  \App\Models\EventGuest  $eventGuest
     * @return void
     */
    public function created(EventGuest $eventGuest)
    {
        //
    }

    /**
     * Handle the event guest "updated" event.
     *
     * @param  \App\Models\EventGuest  $eventGuest
     * @return void
     */
    public function updated(EventGuest $eventGuest)
    {
        //
    }

    /**
     * Handle the event guest "deleted" event.
     *
     * @param  \App\Models\EventGuest  $eventGuest
     * @return void
     */
    public function deleted(EventGuest $eventGuest)
    {
        //
    }

    /**
     * Handle the event guest "restored" event.
     *
     * @param  \App\Models\EventGuest  $eventGuest
     * @return void
     */
    public function restored(EventGuest $eventGuest)
    {
        //
    }

    /**
     * Handle the event guest "force deleted" event.
     *
     * @param  \App\Models\EventGuest  $eventGuest
     * @return void
     */
    public function forceDeleted(EventGuest $eventGuest)
    {
        //
    }
}
