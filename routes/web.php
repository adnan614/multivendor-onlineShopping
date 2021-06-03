<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


Route::get('/', function () {
    alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');



    return view('welcome');
});

Route::get('/home', 'Frontend\HomeController@home')->name('home');


// customer login & registration

Route::get('/customer/login', 'Frontend\CustomerLoginController@customerLogin')->name('customerLogin');

Route::post('/customer/signup', 'Frontend\CustomerLoginController@signup')->name('signup');
Route::post('/customer/login', 'Frontend\CustomerLoginController@Login')->name('Login');

// customer logout

Route::get('/customer/logout', 'Frontend\CustomerLoginController@logout')->name('customerLogout')->middleware('customer');

// seller account login & registration

Route::get('/sellerRegister', 'Backend\SellerController@registerIndex')->name('register');
Route::get('/seller/login/form', 'Backend\SellerController@loginIndex')->name('seller.login');

Route::post('/seller/insert/register', 'Backend\SellerController@register')->name('sellerRegister');
Route::post('/seller/login', 'Backend\SellerController@login')->name('login.seller');

// seller logout

Route::get('/seller/logout', 'Backend\SellerController@logout')->name('logout')->middleware('seller');


// admin login

Route::get('/admin/login/form', 'admin\adminController@showLogin')->name('show.login');
Route::post('/admin/login/', 'admin\adminController@login')->name('login.admin');

//admin logout

Route::get('/admin/logout', 'admin\adminController@logout')->name('admin.logout')->middleware('admin');

// seller dashboard

Route::get('/seller', 'Backend\HomeController@index')->name('dashboard')->middleware('seller');


// products seller //

Route::group(['middleware' => ['seller', 'approval']], function () {
    Route::get('/insertProduct', 'Backend\productController@insertProduct')->name('insertProduct');
    Route::get('/viewProduct', 'Backend\productController@viewProduct')->name('viewProduct');
    Route::get('delete.product{id}', 'Backend\productController@deleteProduct');
    Route::get('edit.product{id}', 'Backend\productController@editProduct');
    Route::post('/addProduct', 'Backend\productController@addProduct')->name('addProduct');
    Route::post('/update/product/{id}', 'Backend\productController@updateProduct')->name('update.product');
    Route::get('/seller/view/order/', 'Backend\OrderController@viewOrder')->name('view.order');
    Route::get('/seller/view/seller/{id}', 'Backend\SellerController@productActiveStatus')->name('product.active');
    Route::put('/seller/view/order/{id}', 'Backend\OrderController@OrderStatus')->name('order.update');
    Route::get('/seller/view/order/{id}', 'Backend\OrderController@generateInvoice')->name('generate.invoice');
});

// frontend my account

Route::get('/MyAccount/', 'Frontend\myAccountController@myAccount')->name('my.account');
Route::get('/MyAccount/editMyAccount', 'Frontend\myAccountController@editMyAccount')->name('edit.account');
Route::put('/MyAccount/edit/', 'Frontend\myAccountController@edit')->name('edit');
Route::get('/MyAccount/MyOrder', 'Frontend\myAccountController@showOrder')->name('my.order');
Route::get('/MyAccount/MyOrder/view/{id}', 'Frontend\myAccountController@orderView')->name('order.products');

// frontend shop

Route::get('/shop', 'Frontend\shopController@viewShop')->name('shop');
Route::get('/shop/{user_id}', 'Frontend\shopController@shopWiseShow')->name('shopWise.show');

// frontend products

Route::get('/categoryWiseShow/{id}', 'Frontend\HomeController@categoryWiseShow')->name('categoryWiseShow');

// frontend productsDetails

Route::get('/productDetails/{id}', 'Frontend\ProductDetailsController@productDetails')->name('productDetails');

// frontend password
Route::get('/MyAccount/ChangePassword/', 'Frontend\myAccountController@changePassword')->name('change.password');
Route::put('/MyAccount/editPassword/', 'Frontend\myAccountController@editPassword')->name('edit.password');


//  checkout

Route::get('/checkout', 'Frontend\CheckoutController@checkout')->name('checkout.form')->middleware('customer');


Route::post('/add/shipping/details', 'Frontend\CheckoutController@addCheckout')->name('add.shipping');

// cart

Route::get('/cart', 'Frontend\CartController@cart')->name('cart');
Route::post('/cart/add/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::get('/cart/remove/{id}', 'Frontend\CartController@CartRemove')->name('cart.remove');
Route::put('/cart/update/{id}', 'Frontend\CartController@CartUpdate')->name('cart.update');

// admin 

Route::group(['middleware' => 'admin'], function () {

    Route::get('/login/google', 'admin\adminController@redirectToGoogle')->name('login.google');
    Route::get('/login/google/callback', 'admin\adminController@handleGoogleCallback');

    Route::get('/login/facebook', 'admin\adminController@redirectToFacebook')->name('login.facebook');
    Route::get('/login/facebook/callback', 'admin\adminController@handleFacebookCallback');

    Route::get('/login/github', 'admin\adminController@redirectToGithub')->name('login.github');
    Route::get('/login/github/callback', 'admin\adminController@handleGithubCallback');

    Route::get('/admin', 'admin\adminController@adminShow')->name('admin.dashboard');
    // Category admin//
    Route::get('/insertCategory', 'admin\CategoryController@insertCategory')->name('insertCategory');
    Route::post('/storeCategory', 'admin\CategoryController@storeCategory')->name('storeCategory');
    Route::get('/viewCategory', 'admin\CategoryController@viewCategory')->name('viewCategory');
    Route::get('edit/category/{slug}', 'admin\CategoryController@editCategory')->name('category.edit');
    Route::get('delete.category{id}', 'admin\CategoryController@deleteCategory');
    Route::post('update/category/{slug}', 'admin\CategoryController@updateCategory')->name('update.category');

    Route::get('/admin/view/customer', 'admin\customerController@viewCustomer')->name('view.customer');
    Route::get('/admin/view/seller', 'admin\sellerController@viewSeller')->name('view.seller');
    Route::get('/admin/view/customer/delete{id}', 'admin\customerController@CustomerDelete')->name('customer.delete');
    Route::get('/admin/view/seller/delete/{id}', 'admin\sellerController@sellerDelete')->name('seller.delete');

    Route::get('/admin/slider/insert', 'admin\sliderController@insertSliderForm')->name('insert.slider');

    Route::post('admin/slider/add/slider', 'admin\sliderController@addSlider')->name('add.slider');
    Route::get('admin/slider/view/slider', 'admin\sliderController@viewSlider')->name('view.slider');
    Route::get('admin/slider/view/slider/delete/{id}', 'admin\sliderController@sliderDelete')->name('slider.delete');

    Route::get('/seller/view/category/{id}', 'admin\CategoryController@categoryActiveStatus')->name('category.active');
    Route::get('/admin/view/seller/{id}', 'admin\sellerController@activeStatus')->name('active');
});
