<?php
/**
 * @var \App\Models\Order[] $orders
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between pt-4">
                <h5>Замовлення</h5>
            </div>
            <div class="card-body">
                @if(0 === $orders->total())
                    <h2>Поки немає замовлень</h2>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Замовник</th>
                                <th>Кількість товарів</th>
                                <th>Сума замовлення</th>
                                <th>Статус</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $order->id }}</strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orders.edit', $order->id) }}">
                                           {{ $order->name }} {{ $order->surname }}
                                        </a>
                                    </td>
                                    <td>
                                        <p><strong>{{ $order->products()->count()}} Товарів</strong></p>
                                        <ul>
                                            {{$order->products()->implode('title', "<br>")}}
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-success me-1">{{ $order->total }}</span></td>

                                    <td><span class="badge bg-label-success me-1">{{ $order->status()->pluck('name')->implode('name', ',') }}</span></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a class="btn btn-success"
                                               href="{{ route('admin.orders.edit', $order)  }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                            <tr>
                                <th>ID</th>
                                <th>Замовник</th>
                                <th>Кількість товарів</th>
                                <th>Сума замовлення</th>
                                <th>Статус</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pagination">
                            {{ $orders->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
