<?php

namespace App\Observers;

use App\Models\Statut;

class StatutObserver
{
    /**
     * Handle the statut "created" event.
     *
     * @param  \App\Models\Statut  $statut
     * @return void
     */
    public function created(Statut $statut)
    {
        //
    }

    /**
     * Handle the statut "updated" event.
     *
     * @param  \App\Models\Statut  $statut
     * @return void
     */
    public function updated(Statut $statut)
    {
        //
    }

    /**
     * Handle the statut "deleted" event.
     *
     * @param  \App\Models\Statut  $statut
     * @return void
     */
    public function deleted(Statut $statut)
    {
        //
    }

    /**
     * Handle the statut "restored" event.
     *
     * @param  \App\Models\Statut  $statut
     * @return void
     */
    public function restored(Statut $statut)
    {
        //
    }

    /**
     * Handle the statut "force deleted" event.
     *
     * @param  \App\Models\Statut  $statut
     * @return void
     */
    public function forceDeleted(Statut $statut)
    {
        //
    }
}
