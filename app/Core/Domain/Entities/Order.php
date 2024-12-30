<?php

namespace App\Core\Domain\Entities;

use App\Core\Domain\Policies\PercentageDiscountPolicy;
use App\Core\Domain\Policies\FixedAmountDiscountPolicy;

CONST DISCOUNT_TYPE_FIXED_AMOUNT = 'fixed_amount';
CONST DISCOUNT_TYPE_PERCENTAGE = 'percentage';

class Order {
    private $id;
    private $customerId;
    private $products;
    private $discount;

    public function __construct($id, $customerId, $products, Discount $discount = null) {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->products = $products;
        $this->total = $this->calculateTotal();
    }

    public function getId() {
        return $this->id;
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    public function getProducts() {
        return $this->products;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Core price calculation (Business) logic
    public function calculateTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        if($this->discount) {        
        if ($this->discount->getType() === DISCOUNT_TYPE_FIXED_AMOUNT) {
            $discountPolicy = new FixedAmountDiscountPolicy(
                $this->discoutAmount ?? 10
            );

        } else if ($this->discount->getType() === DISCOUNT_TYPE_PERCENTAGE) {
            $discountPolicy = new PercentageDiscountPolicy(
                $this->discountPercentage ?? 30
            );
        }
        $total = $discountPolicy->applyDiscount($total);
        }
        return $total;
    }
}