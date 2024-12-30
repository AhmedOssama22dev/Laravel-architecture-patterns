<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\Order;

interface OrderRepositoryInterface {
    public function create(Order $order);
    public function getById($id);
}