<?php

namespace App\Observers;

use App\Models\Catalog;
use App\Models\Feed;

class CatalogObserver
{
    /**
     * Handle the Catalog "created" event.
     */
    public function created(Catalog $catalog): void
    {
        $feed = new Feed;
        $feed->model_name = 'Catalog';
        $feed->model_id = $catalog->id;
        $feed->status = 'created';
        $feed->save();
    }

    /**
     * Handle the Catalog "updated" event.
     */
    public function updated(Catalog $catalog): void
    {
        //
    }

    /**
     * Handle the Catalog "deleted" event.
     */
    public function deleted(Catalog $catalog): void
    {
        //
    }

    /**
     * Handle the Catalog "restored" event.
     */
    public function restored(Catalog $catalog): void
    {
        //
    }

    /**
     * Handle the Catalog "force deleted" event.
     */
    public function forceDeleted(Catalog $catalog): void
    {
        //
    }
}
