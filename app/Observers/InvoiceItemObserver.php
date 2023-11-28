<?php

namespace App\Observers;

use App\Models\InvoiceItem;

class InvoiceItemObserver
{
    /**
     * Handle the invoice item "created" event.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return void
     */
    public function created(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Handle the invoice item "updated" event.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return void
     */
    public function updated(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Handle the invoice item "deleted" event.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return void
     */
    public function deleted(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Handle the invoice item "restored" event.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return void
     */
    public function restored(InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Handle the invoice item "force deleted" event.
     *
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return void
     */
    public function forceDeleted(InvoiceItem $invoiceItem)
    {
        //
    }
}
