<?php

namespace App\Core\Domain\Policies;

use App\Core\Domain\Contracts\DiscountPolicy;

class FixedAmountDiscountPolicy implements DiscountPolicy {
    private $discountAmount;

    public function __construct($discountAmount) {
        $this->discountAmount = $discountAmount;
    }

    public function applyDiscount(float $total): float {
        return $total - $this->discountAmount;
    }
}