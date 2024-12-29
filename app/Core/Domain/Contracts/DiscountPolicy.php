<?php

namespace App\Core\Domain\Contracts;

interface DiscountPolicy {
    public function applyDiscount(float $total): float;
}