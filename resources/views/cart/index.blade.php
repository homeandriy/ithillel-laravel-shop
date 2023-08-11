<x-app-layout>
    <!-- Breadcrumb start -->
    <div class="gi-breadcrumb m-b-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gi_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="gi-breadcrumb-title">Cart Page</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list">
                                <li class="gi-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="gi-breadcrumb-item"><a href="{{ route('products.index') }}">Shop</a></li>
                                <li class="gi-breadcrumb-item active">Cart Page</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <!-- Cart section -->
    <section class="gi-cart-section padding-tb-40">
        <h2 class="d-none">Cart Page</h2>
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="gi-cart-rightside col-lg-4 col-md-12">
                    <div class="gi-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="gi-sidebar-block">
                            <div class="gi-sb-title">
                                <h3 class="gi-sidebar-title">Summary</h3>
                            </div>
                            <div class="gi-sb-block-content">
                                <div class="gi-cart-summary-bottom">
                                    <div class="gi-cart-summary">
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span class="text-right">{{ Cart::instance('cart')->subtotal() }} ₴</span>
                                        </div>
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right">{{ Cart::instance('cart')->tax() }}</span>
                                        </div>
                                        <div class="gi-cart-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right">{{ Cart::instance('cart')->total() }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gi-cart-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- cart content Start -->
                    <div class="gi-cart-content">
                        <div class="gi-cart-inner">
                            <div class="row">
                                <div class="table-content cart-table-content">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th style="text-align: center;">Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php /** @var \Gloudemans\Shoppingcart\CartItem $cartProduct */ ?>
                                            @foreach(Cart::instance('cart')->content() as $cartProduct)
                                                <tr>
                                                    <td data-label="Product" class="gi-cart-pro-name">
                                                        <a href="{{ route('products.show', $cartProduct->model) }}">
                                                            <img class="gi-cart-pro-img mr-4"
                                                                 src="{{ $cartProduct->model->thumbnailUrl }}" alt="">
                                                            {{ $cartProduct->name }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Price" class="gi-cart-pro-price">
                                                        <span class="amount">{{ $cartProduct->price }} ₴</span>
                                                    </td>
                                                    <td data-label="Quantity" class="gi-cart-pro-qty" style="text-align: center;">
                                                        <div>
                                                            <form action="{{ route('cart.count.update', $cartProduct->model) }}" method="POST">
                                                                <div class="cart-qty-plus-minus">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}">
                                                                    <input class="cart-plus-minus" type="text" name="quantity" value="{{ $cartProduct->qty }}">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td data-label="Total" class="gi-cart-pro-subtotal">{{ $cartProduct->total() }}</td>
                                                    <td data-label="Remove" class="gi-cart-pro-remove">
                                                        <form action="{{ route('cart.remove') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}" />
                                                            <button type="submit" class="btn btn-danger"><i class="gicon gi-trash-o"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="gi-cart-update-bottom">
                                            <a href="{{ route('products.index') }}">Continue Shopping</a>
                                            <a href="{{ route('checkout') }}" class="btn gi-btn-2">Check Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Cart section End -->
</x-app-layout>
