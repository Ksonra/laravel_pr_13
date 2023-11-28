<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
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
