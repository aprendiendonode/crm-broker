<?php

namespace App\Observers;

use App\Models\Agency;

class AgencyObserver
{
    /**
     * Handle the agency "created" event.
     *
     * @param  \App\Agency  $agency
     * @return void
     */
    public function created(Agency $agency)
    {
        cache()->forget('cache_agencies_'.auth()->user()->business_id);
    }

    /**
     * Handle the agency "updated" event.
     *
     * @param  \App\Agency  $agency
     * @return void
     */
    public function updated(Agency $agency)
    {
        cache()->forget('cache_agencies_'.auth()->user()->business_id);
    }

    /**
     * Handle the agency "deleted" event.
     *
     * @param  \App\Agency  $agency
     * @return void
     */
    public function deleted(Agency $agency)
    {
        cache()->forget('cache_agencies_'.auth()->user()->business_id);
    }

    /**
     * Handle the agency "restored" event.
     *
     * @param  \App\Agency  $agency
     * @return void
     */
    public function restored(Agency $agency)
    {
        cache()->forget('cache_agencies_'.auth()->user()->business_id);
    }

    /**
     * Handle the agency "force deleted" event.
     *
     * @param  \App\Agency  $agency
     * @return void
     */
    public function forceDeleted(Agency $agency)
    {
        cache()->forget('cache_agencies_'.auth()->user()->business_id);
    }
}
