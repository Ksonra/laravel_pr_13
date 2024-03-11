<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public function priceMin($value){
        return $this->where('price', '>=', $value);
    }
    public function priceMax($value){
        return $this->where('price', '>=', $value);
    }
    public function search($search){
        return $this->where('name', 'LIKE', '%'.$search.'%');
    }
}
