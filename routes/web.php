<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\CarsController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\auth\AuthenticationController;

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

// Login Routes
Route::get('/register/page',[AuthenticationController::class,'registerpage'])->name('register.page');
Route::post('/create/user',[AuthenticationController::class,'createuser'])->name('craete.user');
Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
Route::post('/authentication', [AuthenticationController::class, 'authentication'])->name('authentication');
Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');
// Admin Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Car module
    Route::get('/view/products', [CarsController::class, 'index'])->name('view.products');
    Route::any('/create/products/info/{id?}', [CarsController::class, 'create'])->name('create.products');
    Route::get('/delete/products/info/{id?}', [CarsController::class, 'destroy'])->name('delete.products');
    // Order manage
    Route::get('/manage/order',[AdminController::class,'order'])->name('order.manage');
    Route::get('/query/list',[AdminController::class,'query_list'])->name('query.list');
    Route::get('/order/delivered/{id}',[AdminController::class,'orderDelivered'])->name('order.delivered');
});
Route::middleware(['auth:web'])->group(function () {
    Route::post('/query', [VisitorController::class, 'query'])->name('query');
    Route::post('/add-to-cart', [CartController::class, 'index'])->name('cart.add');
    // Route::get('/check/out',[CheckoutController::class, 'index'])->name('check.out');
    // route::get('/checkout', [CheckoutController::class, 'viewCheckout'])->name('view.checkout');
    route::post('/confirm-payment', [CheckoutController::class, 'checkout'])->name('payment.using.stripe');
    Route::get('/order/user',[VisitorController::class,'visitororder'])->name('visitor.order');
    Route::get('/cancel/order/{id}',[VisitorController::class,'cancelorder'])->name('visitor.cancelorder');
    Route::controller(StripePaymentController::class)->group(function(){
        Route::get('stripe','stripe')->name('stripe.index');
        Route::get('stripe/checkout','stripeCheckout')->name('stripe.checkout');
        Route::get('stripe/checkout/success','stripeCheckoutSuccess')->name('stripe.checkout.success');
    });
});
// Visiter route
Route::get('/', [VisitorController::class, 'index'])->name('index');
Route::get('/about', [VisitorController::class, 'about'])->name('about');
Route::get('/jewellery-shop', [VisitorController::class, 'shop'])->name('jewellery.shop');
Route::get('/contact/us', [VisitorController::class, 'contact'])->name('contact.us');
Route::post('cash/delivery',[OrderController::class,'cashOndeliver'])->name('cashOn.deliver');