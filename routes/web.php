<?php

use App\Models\CategoryMain;

Auth::routes();
Route::redirect('/', 'home', 301);
// Route::get('dangnhap', 'Auth\LoginController@login')->name('client.login');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::namespace('Admin')->middleware('auth','isAdmin')->group( function () {
    Route::resources([
        'product' => 'ProductController',
        'category' => 'CategoryController',
        'slide' => 'SlideController',
        'account' => 'AccountController',
        'category_type' => 'CategoryTypeController',
        'bill' => 'BillController',
        'permission' => 'PermissionController',
        'category_main' => 'CategoryMainController'
    ]);
    Route::get('/admin','DashboardController@index')->name('dashboard');
});

Route::get('tesst', function () {
    dd(CategoryMain::with('categories.typeCategories')->get());
});

//phần fontend
Route::namespace('Client')->group(function () {
    Route::get('/home','IndexController@index')->name('home');
    Route::get('home/product/{slug}','IndexController@productDetail')->name('product.detail');
    Route::get('category-detail/{id}','CategoryController@category_detail')->name('category.detail');
    Route::middleware('auth')->group(function () {
        Route::post('add-to-cart/{product_id}', 'CartController@store')->name('cart.store');
        Route::post('add-to-cart-detail/{product_id}', 'CartController@store_detail')->name('cart.store.detail');
        Route::get('detail-to-cart','CartController@detail')->name('cart.detail');
        Route::get('cart-up/{id}', 'CartController@update_up')->name('cart.up');
        Route::get('cart-down/{id}','CartController@update_down')->name('cart.down');
        Route::get('destroy-to-card/{id}','CartController@destroy')->name('cart.destroy');
        Route::get('account-user','AccountController@show')->name('account.show');
        Route::post('address','AccountController@newAddress')->name('address.store');
        Route::get('checkout/shipping','CheckoutController@choseAddress')->name('checkout.shipping');
        Route::post('checkout/payment','CheckoutController@chosePayment')->name('checkout.payment');
        Route::post('checkout','CheckoutController@store')->name('checkout.store');
        Route::get('checkout/complete','CheckoutController@billShow')->name('bill.show');
        Route::get('test','IndexController@test')->name('test');
        Route::get('profile-user','AccountController@profile_user')->name('profile.index');
        Route::post('profile-user-update','AccountController@profile_user_update')->name('user.update');
        Route::get('change-password','ChangePasswordController@change_password')->name('change.password');
        Route::post('change-password-update', 'ChangePasswordController@update')->name('change.password.update');
        Route::get('store-address','AddressController@index_address')->name('address.index');
        Route::post('store-address-update', 'AddressController@store')->name('store.address');
        Route::get('list-order','OrderController@index_order')->name('order.index');
        Route::post('post-comment/{id}','CommentController@post_comment')->name('comment.post');
        Route::get('like_product','ProductLikeController@index')->name('product.like');
        Route::post('product-like/{product_id}','ProductLikeController@store_product_like')->name('product.store.like');
    });
});
