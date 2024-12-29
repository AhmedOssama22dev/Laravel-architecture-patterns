<?php

namespace App\Core\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $table = 'orders';
    protected $fillable = ['id', 'customer_id', 'total'];

    public function products() {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id');
    }

}