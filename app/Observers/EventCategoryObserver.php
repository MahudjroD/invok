<?php

namespace App\Observers;

use App\Models\EventCategory;

class EventCategoryObserver
{
    /**
     * Handle the event category "created" event.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return void
     */
    public function created(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Handle the event category "updated" event.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return void
     */
    public function updated(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Handle the event category "deleted" event.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return void
     */
    public function deleted(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Handle the event category "restored" event.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return void
     */
    public function restored(EventCategory $eventCategory)
    {
        //
    }

    /**
     * Handle the event category "force deleted" event.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return void
     */
    public function forceDeleted(EventCategory $eventCategory)
    {
        //
    }
}
