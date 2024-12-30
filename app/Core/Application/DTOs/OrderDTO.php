<?php

namespace App\Core\Application\DTOs;

use App\Core\Domain\Entities\Discount;

class OrderDTO {
    public $customerId;
    public $products;
    public $discount;

    public function __construct($customerId, $products, Discount $discount = null) {
        $this->customerId = $customerId;
        $this->products = $products;
        $this->discount = $discount;
    }

    // sanitization may be added here
}
    