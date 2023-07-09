<?php
/**
 * @var \App\Models\Category[] $categories
 * @var \App\Models\Category $category
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.categories.index') }}">Категорії</a></span>/
            Редагування
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        {{ $category->name }}
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div>
                                <label class="form-label" for="category-name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="category-name" placeholder="Name" name="name" aria-describedby="category-name-helper" value="{{ $category->name }}">
                                <div id="category-name-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <label for="category-description" class="form-label">Description</label>
                                <textarea class="form-control" id="category-description" name="description" aria-describedby="category-description-helper" rows="3" placeholder="Description">{{ $category->description }}</textarea>
                                <div id="category-description-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-2 mb-3">
                                <label for="category-parent" class="form-label">Parent category</label>
                                <select id="category-parent" class="form-select form-select-lg" name="parent_id">
                                    <option value="">Батьківська категорія</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id === $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
                            </div>

                            <button type="submit" class="btn rounded-pill btn-primary">Оновити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
