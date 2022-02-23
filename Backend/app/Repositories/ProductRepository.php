<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository{

    public function getModel()
    {
        return Product::class;
    }
}
