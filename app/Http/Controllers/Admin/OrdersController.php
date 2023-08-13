<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderStatusChange;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $orders = Order::orderByDesc( 'id' )->paginate( 5 );

        return view(
            'admin.orders.index',
            compact( 'orders' )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Order $order ) {
        return view( 'admin.orders.edit', compact( 'order' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateOrderRequest $request, Order $order ) {
        $prevStatus = null;
        $validated  = $request->validated();
        if ( isset( $validated['status_id'] ) && (int) $validated['status_id'] !== (int) $order->status_id ) {
            // не генеруємо подію до збереження
            $prevStatus = (int) $order->status_id;
        }
        $order->updateOrFail( $validated );

        if ( $prevStatus ) {
            // Викликаємо подію після збереження
            OrderStatusChange::dispatch( $order, $prevStatus );
        }

        return redirect()->route( 'admin.orders.edit', $order );
    }
}
