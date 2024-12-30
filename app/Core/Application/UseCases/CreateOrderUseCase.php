<?php

namespace App\Core\Application\UseCases;

use App\Core\Domain\Entities\Order;
use App\Core\Application\DTOs\OrderDTO;
use App\Core\Domain\Repositories\OrderRepositoryInterface;

class CreateOrderUseCase {

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }
    public function execute(OrderDTO $orderDTO): Order {
        $order = new Order(uniqid(), $orderDTO->customerId, $orderDTO->products, $orderDTO->discount);
        return $this->orderRepository->create($order);
    }
}