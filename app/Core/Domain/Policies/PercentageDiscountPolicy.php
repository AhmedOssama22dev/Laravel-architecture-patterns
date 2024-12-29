<?php

namespace App\Core\Domain\Policies;

use App\Core\Domain\Contracts\DiscountPolicy;

class PercentageDiscountPolicy implements DiscountPolicy {
    private $discountPercentage;

    public function __construct($discountPercentage) {
        $this->discountPercentage = $discountPercentage;
    }

    public function applyDiscount(float $total): float {
        return $total - ($total * $this->discountPercentage / 100);
    }
}