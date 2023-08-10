<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::get('invoice', function() {
    $order = \App\Models\Order::all()->last();
    /** @var \App\Services\InvoicesService $invoiceService */
    $invoiceService = app()->make(\App\Services\Contracts\InvoicesServiceContract::class);
//    dd($invoiceService->generate($order)->url());
    \App\Events\OrderCreated::dispatch($order);
});

Route::name('callbacks.')->prefix('callback')->middleware(['role:admin|moderator|customer'])->group(function () {
    Route::get('telegram', \App\Http\Controllers\Callbacks\TelegramController::class)->name('telegram');
});
Route::resource('products', \App\Http\Controllers\ProductsController::class)->only(['index', 'show'])->scoped(['product' => 'slug']);
Route::resource('categories', \App\Http\Controllers\CategoriesController::class)->only(['index', 'show'])->scoped(['category' => 'slug']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');
    Route::get('orders/{order}/paypal/thank-you', [\App\Http\Controllers\Orders\ThankYouPageController::class, 'paypal'])->name('payment.thankyou');

    Route::name('wishlist.')->prefix('wishlist')->group(function (){
        Route::get('/', [\App\Http\Controllers\WishlistController::class, 'index'])->name('index');
        Route::post('{product}', [\App\Http\Controllers\WishlistController::class, 'add'])->name('add');
        Route::delete('/', [\App\Http\Controllers\WishlistController::class, 'remove'])->name('remove');
    });
});

require __DIR__.'/auth.php';

Route::name('admin.')->prefix('admin')->middleware(['role:admin|moderator'])->group(function() {
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
    Route::resource('images', \App\Http\Controllers\Admin\ImagesController::class)->except(['show']);
    Route::resource('users', \App\Http\Controllers\Admin\UsersController::class)->except(['show']);
    Route::resource('orders', \App\Http\Controllers\Admin\OrdersController::class)->except(
        [
            'create', 'store', 'destroy', 'show'
        ]
    );
});

Route::name('ajax.')->middleware('auth')->prefix('ajax')->group(function() {
    Route::group(['role:admin|moderator'], function() {
        Route::delete('images/{image}', \App\Http\Controllers\Ajax\RemoveImageController::class)->name('images.delete');
    });
    Route::prefix('paypal')->name('paypal.')->group(function() {
        Route::post('order/create', [\App\Http\Controllers\Ajax\Payments\PaypalController::class, 'create'])->name('orders.create');
        Route::post('order/{orderId}/capture', [\App\Http\Controllers\Ajax\Payments\PaypalController::class, 'capture'])->name('orders.capture');
    });
});

Route::name('cart.')->prefix('cart')->group(function() {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('index');
    Route::post('{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('add');
    Route::delete('/', [\App\Http\Controllers\CartController::class, 'remove'])->name('remove');
    Route::put('{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('count.update');
});
