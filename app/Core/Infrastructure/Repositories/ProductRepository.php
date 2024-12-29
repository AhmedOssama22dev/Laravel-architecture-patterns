<?php

namespace App\Core\Infrastructure\Repositories;

use App\Core\Domain\Entities\Product;
use App\Core\Infrastructure\Models\Product as ProductModel;

use App\Core\Domain\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    public function getById($id): ?Product {
        $productModel = ProductModel::find($id);
        if ($productModel === null) {
            return null;
        }
        $product = new Product($productModel->id, $productModel->name, $productModel->price);
        return $product;
    }

    public function getAll() {
        $productModels = ProductModel::all();
        $products = [];
        foreach ($productModels as $productModel) {
            $product = new Product($productModel->id, $productModel->name, $productModel->price);
            $products[] = $product;
        }
        return $products;
    }

    public function create(Product $product): Product {
        $productModel = new ProductModel();
        $productModel->name = $product->getName();
        $productModel->price = $product->getPrice();
        $productModel->save();
        $product->setId($productModel->id);
        return $product;
    }

}