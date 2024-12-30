<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Core\Domain\Entities\Discount;
use App\Core\Application\DTOs\OrderDTO;
use App\Core\Application\UseCases\CreateOrderUseCase;

class OrderController extends Controller
{
    private $createOrderUseCase;

    public function __construct(CreateOrderUseCase $createOrderUseCase)
    {
        $this->createOrderUseCase = $createOrderUseCase;
    }
    public function store(OrderRequest $request)
    {
        $discount = new Discount($request->discountType, $request->discountValue);
        $orderDTO = new OrderDTO($request->customerId, $request->products, $discount);
        $order = $this->createOrderUseCase->execute($orderDTO);

        return new OrderResource($order);
    }
}