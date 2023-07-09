<?php
/**
 * @var \App\Models\Product $product
 */
?>

@if($product->discount)
    <h5>
        <span class="text-danger">{{ $product->price - (round(($product->price / 100) * $product->discount, 2))  }}₴</span>/<s>{{ $product->price }}₴</s>
    </h5>
@else
    <h4>{{ $product->price }}₴</h4>
@endif
