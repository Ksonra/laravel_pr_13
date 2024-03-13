<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public function priceMin($value){
        return $this->where('price', '>=', $value);
    }
    public function priceMax($value){
        return $this->where('price', '<=', $value);
    }
    public function search($search){
        return $this->where('name', 'LIKE', '%'.$search.'%');
    }
    public function categories($catalog_id){
        return $this->where('catalog_id', $catalog_id);
    }
    public function discount($value){
        return $this->whereNotNull('discount');
    }
}
