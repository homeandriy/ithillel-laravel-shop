@props([
    'type' => 'a',
    'colorType' => 'primary',
    'action' => ''
])

@php
    $typeClassesDict = [
        'primary' => 'btn-primary',
        'success' => 'btn-success',
        'warning' => 'btn-warning',
        'danger' => 'btn-danger',
        'info' => 'btn-info',
    ];

    $defaultClasses = 'btn';
    $typeClasses = $typeClassesDict[$colorType];

    $actionType = $action ? "type={$action}" : '';
@endphp

<{{$type}} {{$actionType}} {{ $attributes->merge(['class' => $defaultClasses . ' ' . $typeClasses]) }}>
{{ $slot }}
</{{$type}}>
