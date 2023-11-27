<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Feed;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        // dd($product);
        $feed = new Feed;
        $feed->model_name = 'Product';
        $feed->model_id = $product->id;
        $feed->status = 'created';
        $feed->save();
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $feed = new Feed;
        $feed->model_name = 'Product';
        $feed->model_id = $product->id;
        $feed->status = 'updated';
        $feed->save();
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
