<?php

namespace App\Observers;

use App\Models\Color;

class ColorObserver
{
    /**
     * Handle the color "created" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function created(Color $color)
    {
        //
    }

    /**
     * Handle the color "updated" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function updated(Color $color)
    {
        //
    }

    /**
     * Handle the color "deleted" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function deleted(Color $color)
    {
        //
    }

    /**
     * Handle the color "restored" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function restored(Color $color)
    {
        //
    }

    /**
     * Handle the color "force deleted" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function forceDeleted(Color $color)
    {
        //
    }
}
