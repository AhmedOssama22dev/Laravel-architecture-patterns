<?php

namespace App\Core\Application\UseCases;

use App\Core\Domain\Entities\Order;
use App\Core\Domain\Repositories\OrderRepositoryInterface;

class GetOrderUseCase {
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function execute($id): Order {
        return $this->orderRepository->getById($id);
    }
}