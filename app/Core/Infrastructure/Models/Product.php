<?php 

namespace App\Core\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'products';
    protected $fillable = ['name', 'price'];

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }
    
}