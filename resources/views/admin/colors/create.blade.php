<?php
/**
 *
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.colors.index') }}">Кольори</a></span>/
            Створення Бренду
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Виберіть новий колір
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.colors.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div>
                                <label class="form-label" for="color-hex">Color</label>
                                <input type="color" class="form-control form-control-lg" id="color-hex" placeholder="hex" name="hex" aria-describedby="color-hex-helper">
                                <div id="color-hex-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('hex')" class="mt-2" />
                                </div>
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary">Створити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
