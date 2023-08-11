<x-app-layout>
    <!-- Breadcrumb start -->
    <div class="gi-breadcrumb m-b-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row gi_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="gi-breadcrumb-title">Wishlist Page</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- gi-breadcrumb-list start -->
                            <ul class="gi-breadcrumb-list">
                                <li class="gi-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="gi-breadcrumb-item active">Wishlist Page</li>
                            </ul>
                            <!-- gi-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <!-- Wishlist section -->
    <section class="gi-faq padding-tb-40 gi-wishlist">
        <div class="container">
            <div class="section-title-2">
                <h2 class="gi-title">Product <span>Wishlist</span></h2>
                <p>Your product wish is our first priority.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gi-vendor-dashboard-card">
                        <div class="gi-vendor-card-header">
                            <h5>Wishlist</h5>
                            <div class="gi-header-btn">
                                <a class="gi-btn-2" href="{{ route('checkout') }}">Shop Now</a>
                            </div>
                        </div>
                        <div class="gi-vendor-card-body">
                            <div class="gi-vendor-card-table">
                                @if(!Cart::instance('wishlist')->content()->count())
                                    <h2>Wishlist is empty</h2>
                                @else
                                    <table class="table gi-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="wish-empt">
                                    <?php /** @var \Gloudemans\Shoppingcart\CartItem $wishlistProduct */ ?>
                                    @foreach(Cart::instance('wishlist')->content() as $wishlistProduct)
                                        <tr class="pro-gl-content">
                                            <td scope="row"><span>{{ $wishlistProduct->id }}</span></td>
                                            <td><img class="prod-img" src="{{ $wishlistProduct->model->thumbnailUrl }}"
                                                     alt="{{ $wishlistProduct->name }}"></td>
                                            <td>
                                                <span><a href="{{ route('products.show', $wishlistProduct->model) }}">{{ $wishlistProduct->name }}</a></span>
                                            </td>
                                            <td><span></span></td>
                                            <td><span>{{ $wishlistProduct->price }}</span></td>
                                            <td><span class="avl">Available</span></td>
                                            <td>
                                                    <span class="tbl-btn">
                                                        <form action="{{ route('cart.add', $wishlistProduct->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="gi-btn-2 add-to-cart" title="Add To Cart">
                                                                <i class="fi-rr-shopping-basket"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('wishlist.remove') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="rowId" value="{{ $wishlistProduct->rowId }}" />
                                                            <button type="submit" class="gi-btn-1 gi-remove-wish btn" title="Remove From List"> × </button>
                                                        </form>
                                                    </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wishlist section End -->
</x-app-layout>
