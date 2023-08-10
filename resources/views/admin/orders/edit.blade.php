<?php
/**
 * @var \App\Models\Order $order
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.orders.index') }}">Замовлення</a></span>/
            Редагування {{ $order->id }}
        </h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">
                       Дані замовлення
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th>Project</th>
                                    <th>Client</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>ID</strong></td>
                                        <td>{{ $order->id }} від {{ date('d.m.Y H:i', strtotime($order->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Замовник</strong></td>
                                        <td>{{ $order->name }} {{ $order->surname }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Контакти</strong></td>
                                        <td>{{ $order->email }} / {{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Адреса доставки</strong></td>
                                        <td>{{ $order->city }} / {{ $order->address }}</td>
                                    </tr>
                                </tbody>
                                <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Статус</strong></td>
                                        <td><span class="badge bg-label-success me-1">{{ $order->status()->pluck('name')->implode('name', ',') }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Статус замовлення</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.orders.update', $order) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mt-2 mb-3 w-100">
                                <label for="status_id" class="form-label">Оберіть новий статус замовлення</label>
                                <select name="status_id" id="status_id" class="form-select form-select-lg">
                                    @foreach(\App\Models\OrderStatus::all() as $status)
                                        <option value="{{ $status->id }}" @selected($status->id === $order->status_id)>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary">Оновити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
