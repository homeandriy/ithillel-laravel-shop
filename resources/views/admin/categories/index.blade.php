<?php
/**
 * @var \App\Models\Category[] $categories
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class=" card-header d-flex justify-content-between pt-4">
                <h5>Категорії</h5>
                <div class="px-2">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-dark">Створити категорію</a>
                </div>
            </div>
            <div class="card-body">
                @if(0 === $categories->total())
                    <h2>Немає категорій</h2>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                                <th>Опис</th>
                                <th>Підкатегорія</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $category->id }}</strong></td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}">
                                            <strong>{{$category->name}}</strong>
                                        </a>
                                    <td>
                                        {{ $category->description }}
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">{{ $category->parent()->value('name') }}</span></td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a class="btn btn-success" href="{{ route('admin.categories.edit', $category->id)  }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.categories.destroy', $category)  }}" method="POST" >
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary" ><i class="bx bx-trash me-1"></i> Delete</button>
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
                                <th>Опис</th>
                                <th>Підкатегорія</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pagination">
                            {{ $categories->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
