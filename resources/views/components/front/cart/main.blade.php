

<!-- Cart sidebar Start -->
<div class="gi-side-cart-overlay"></div>
<div id="gi-side-cart" class="gi-side-cart">
    <div class="gi-cart-inner">
        <div class="gi-cart-top">
            <div class="gi-cart-title">
                <span class="cart_title">My Cart</span>
                <a href="javascript:void(0)" class="gi-cart-close">
                    <i class="fi-rr-cross-small"></i>
                </a>
            </div>
            <ul class="gi-cart-pro-items">
                <?php /** @var \App\Models\Product $cartProduct */ ?>
                @foreach(Cart::instance('cart')->content() as $cartProduct)
                <li>
                    <a href="{{ route('products.show', $cartProduct->id) }}" class="gi-pro-img">
                        <img src="{{ $cartProduct->model->thumbnailUrl }}" alt="{{ $cartProduct->name }}">
                    </a>
                    <div class="gi-pro-content">
                        <a href="{{ route('products.show', $cartProduct->id) }}" class="cart-pro-title">{{ $cartProduct->name }}</a>
                        <span class="cart-price"><span>{{ $cartProduct->model->endPrice }}</span> x {{ $cartProduct->qty }}</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="gi-qtybtn" value="{{ $cartProduct->qty }}">
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}" />
                            <button type="submit" class="btn btn-danger"><i class="gicon gi-trash-o"></i></button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="gi-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                    <tr>
                        <td class="text-left">Sub-Total :</td>
                        <td class="text-right">{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">VAT ({{Config::get('cart.tax')}}%) :</td>
                        <td class="text-right">{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">Total :</td>
                        <td class="text-right primary-color">{{ Cart::total() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="{{ route('cart.index') }}" class="gi-btn-1">View Cart</a>
                <a href="{{ route('checkout') }}" class="gi-btn-2">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- Cart sidebar End -->
