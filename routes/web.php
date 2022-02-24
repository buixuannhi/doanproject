<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::group(['prefix' => ''], function () {
    route::get('', [HomeController::class, 'index'])->name('home.index');
    route::get('about', [HomeController::class, 'about'])->name('home.about');
    route::get('product', [HomeController::class, 'product'])->name('home.product');
    route::get('blog', [HomeController::class, 'blog'])->name('home.blog');
    route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
    route::get('sanpham', [HomeController::class, 'sanpham'])->name('home.sanpham');
    route::get('empty', [HomeController::class, 'empty'])->name('home.empty');
    route::get('danh-muc/{id}-{slug}', [HomeController::class, 'category'])->name('home.category');
    route::get('/{id}-{slug}', [HomeController::class, 'product'])->name('home.product');
});


route::group(['prefix' => 'cart'], function () {
    route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
    route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
    route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
    route::get('view', [CartController::class, 'view'])->name('cart.view');
});

route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
route::post('admin/login', [AdminController::class, 'check_login'])->name('admin.login');

route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    route::get('', [AdminController::class, 'index'])->name('admin.index');
    route::get('category', [CategoryController::class, 'index'])->name('category.index');
    //đã login được rồi thì ta có thể cho logout vào bên trong admin
    route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    route::get('category/themmoi', [CategoryController::class, 'themmoi'])->name('category.themmoi');
    route::post('category/themmoi', [CategoryController::class, 'luuchu']);

    route::get('category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');

    route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');

    route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    route::post('category/edit/{id}', [CategoryController::class, 'capnhat'])->name('category.capnhat');

    route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    route::get('category/forcedelete/{id}', [CategoryController::class, 'forcedelete'])->name('category.forcedelete');

    route::get('product/delete-image/{id}', [ProductController::class, 'deleteImage'])->name('product.deleteImage');

    //quản lí đơn hàng
    route::get('order', [AdminOrderController::class, 'index'])->name('admin.order.index');
    route::get('order/detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order.detail');
    route::post('order/status/{id}', [AdminOrderController::class, 'status'])->name('admin.order.status');

    route::resources([
        'product' => ProductController::class

    ]);

});

route::group(['prefix' => 'customer'], function () {
    route::get('login', [CustomerController::class, 'login'])->name('customer.login');
    route::post('login', [CustomerController::class, 'check_login']);

    route::get('register', [CustomerController::class, 'register'])->name('customer.register');
    route::post('register', [CustomerController::class, 'add_customer']);

    route::get('logout', [CustomerController::class, 'logout'])->name('customer.logout');

    route::get('profile', [CustomerController::class, 'profile'])->name('customer.profile')->middleware('mkh');
    route::post('profile', [CustomerController::class, 'profile_update'])->middleware('mkh');

});

route::group(['prefix' => 'order', 'middleware' => 'mkh'], function () {
    route::get('checkout', [orderController::class, 'checkout'])->name('order.checkout');
    route::post('checkout', [orderController::class, 'post_checkout']);
    route::get('history', [orderController::class, 'history'])->name('order.history');
    route::get('detail/{id}', [orderController::class, 'detail'])->name('order.detail');
    route::get('pdf/{id}', [orderController::class, 'pdf'])->name('order.pdf');
    route::get('success', [orderController::class, 'success'])->name('order.success');
    route::get('error', [orderController::class, 'error'])->name('order.error');
    route::get('confirm/{token}', [orderController::class, 'confirm'])->name('order.confirm');

});

?>
