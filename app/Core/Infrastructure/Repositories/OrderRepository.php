<?php 

namespace App\Core\Infrastructure\Repositories;

use App\Core\Domain\Entities\Order;
use App\Core\Domain\Repositories\OrderRepositoryInterface;
use App\Core\Infrastructure\Models\Order as OrderModel;

class OrderRepository implements OrderRepositoryInterface {
    public function create(Order $order): Order {
        $orderModel = new OrderModel();
        $orderModel->customer_id = $order->getCustomerId();
        $orderModel->total = $order->calculateTotal();
        $orderModel->save();
        $order->setId($orderModel->id);
        return $order;
    }

    public function getById($id): ?Order {
        $orderModel = OrderModel::find($id);
        if ($orderModel === null) {
            return null;
        }
        $order = new Order($orderModel->id, $orderModel->customer_id, $orderModel->products);
        $order->setId($orderModel->id);
        return $order;
    }
}