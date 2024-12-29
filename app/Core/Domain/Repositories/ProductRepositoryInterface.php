<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\Product;

interface ProductRepositoryInterface {
    public function getById($id);
    public function getAll();
    public function create(Product $product);
}