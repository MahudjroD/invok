<?php

namespace App\Observers;

use App\Models\Estimation;

class EstimationObserver
{
    /**
     * Handle the estimation "created" event.
     *
     * @param  \App\Models\Estimation  $estimation
     * @return void
     */
    public function created(Estimation $estimation)
    {
        //
    }

    /**
     * Handle the estimation "updated" event.
     *
     * @param  \App\Models\Estimation  $estimation
     * @return void
     */
    public function updated(Estimation $estimation)
    {
        //
    }

    /**
     * Handle the estimation "deleted" event.
     *
     * @param  \App\Models\Estimation  $estimation
     * @return void
     */
    public function deleted(Estimation $estimation)
    {
        //
    }

    /**
     * Handle the estimation "restored" event.
     *
     * @param  \App\Models\Estimation  $estimation
     * @return void
     */
    public function restored(Estimation $estimation)
    {
        //
    }

    /**
     * Handle the estimation "force deleted" event.
     *
     * @param  \App\Models\Estimation  $estimation
     * @return void
     */
    public function forceDeleted(Estimation $estimation)
    {
        //
    }
}
