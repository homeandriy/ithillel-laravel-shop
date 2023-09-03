<?php
/**
 * @var \App\Models\Attributes\Color[] $colors
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class=" card-header d-flex justify-content-between pt-4">
                <h5>Кольори</h5>
                <div class="px-2">
                    <a href="{{ route('admin.colors.create') }}" class="btn btn-dark">Створити колір</a>
                </div>
            </div>
            <div class="card-body">
                @if(0 === $colors->total())
                    <h2>Немає кольорів</h2>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Колір</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $color->id }}</strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.colors.edit', $color->id) }}">
                                            <strong>{{$color->hex}}</strong>
                                            <div
                                                style="width: 20px; height: 20px; background-color: {{$color->hex}}; border: 1px solid #0d1116; border-radius: 50%"
                                            ></div>
                                        </a>
                                    </td>
                                   <td>
                                        <div class="d-flex gap-1">
                                            <a class="btn btn-success"
                                               href="{{ route('admin.colors.edit', $color->id)  }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.colors.destroy', $color)  }}"
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
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pagination">
                            {{ $colors->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
