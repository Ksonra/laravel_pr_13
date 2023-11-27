<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class, 'model_id');
    }

    public function catalog(){
        return $this->belongsTo(Catalog::class, 'model_id');
    }
}

