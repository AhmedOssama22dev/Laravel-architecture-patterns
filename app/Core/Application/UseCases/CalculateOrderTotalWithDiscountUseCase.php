<?php

namespace App\Core\Application\UseCases;

use App\Core\Domain\Contracts\DiscountPolicy;
use App\Core\Domain\Entities\Order;

class CalculateOrderTotalWithDiscountUseCase {
    private $discountPolicy;

    public function __construct(DiscountPolicy $discountPolicy) {
        $this->discountPolicy = $discountPolicy;
    }

    public function execute(Order $order): float {
        $total = $order->calculateTotal();
        return $this->discountPolicy->applyDiscount($total);
    }
}