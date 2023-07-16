<?php
/**
 * @var \App\Models\Image[] $images
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between pt-4">
                <h5 class="card-header">Категорії</h5>
                <div class="px-2">
                    <a href="{{ route('admin.images.create') }}" class="btn btn-dark">Додати зображення</a>
                </div>
            </div>
            @if(0 === $images->total())
                <h2>Немає зображень</h2>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Зображення</th>
                            <th>Приналежність</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $image->id }}</strong></td>
                                <td>
                                    <a href="{{ route('admin.images.edit', $image->id) }}">
                                        <img src="{{ asset('/storage/' .$image->path) }}" alt="Зображення в галереї" width="300px">
                                    </a>
                                <td>
                                    <a href="{{ route('admin.products.edit', $image->imageable()->getResults()) }}">
                                      {{ $image->imageable()->getResults()->title }}
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-success"
                                           href="{{ route('admin.categories.edit', $image->id)  }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('admin.categories.destroy', $image)  }}"
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
                            <th>Зображення</th>
                            <th>Приналежність</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="pagination">
                        {{ $images->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
