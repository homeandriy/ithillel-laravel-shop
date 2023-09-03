<?php
/**
 * @var \App\Models\Attributes\Brand[] $brands
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class=" card-header d-flex justify-content-between pt-4">
                <h5>Бренди</h5>
                <div class="px-2">
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-dark">Створити бренд</a>
                </div>
            </div>
            <div class="card-body">
                @if(0 === $brands->total())
                    <h2>Немає брендів</h2>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Країна</th>
                                <th>Опис</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $brand->id }}</strong></td>
                                    <td>
                                        <a href="{{ route('admin.brands.edit', $brand->id) }}">
                                            <strong>{{$brand->name}}</strong>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $brand->country }}
                                    </td>
                                    <td>
                                        {{ $brand->description }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a class="btn btn-success"
                                               href="{{ route('admin.brands.edit', $brand->id)  }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.brands.destroy', $brand)  }}"
                                                  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Країна</th>
                                <th>Опис</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pagination">
                            {{ $brands->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
