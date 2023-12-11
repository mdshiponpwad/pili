<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SiteMetaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\ChackoutController;
use App\Http\Controllers\Backend\ProductAvatarController;
use App\Http\Controllers\Backend\SocialActivitesController;
use App\Http\Controllers\Backend\ProductAttributeController;


//frontend route.....
    Route::get('bangla',             [HomeController::class,'bangla'])->name('bangla');
    Route::get('english',            [HomeController::class,'english'])->name('english');
    Route::get('/',                  [HomeController::class,'index'])->name('home');

    //products routes ...
    Route::get('/all-products',                    [HomeController::class,'all_products'])->name('all.products');
    Route::get('/product-details/{slug}/{weight}', [HomeController::class,'product_details'])->name('product.details');

    //category route....
    Route::get('/category-details/{slug}', [HomeController::class,'category_details'])->name('category.details');
    Route::post('product-by-attr',         [HomeController::class,'productByattr'])->name('product.by.attr');

    //cart routes...
    Route::post('add-to-cart',             [CartController::class,'store'])->name('add.cart');

    //checkout routes...

    Route::get('proceed-checkout', [HomeController::class,'proceedCheckout'])->name('proceedCheckout');
    Route::post('submit-order',    [HomeController::class,'order'])->name('order');
    

    //blog routes...
    Route::get('blog-details/{slug}', [HomeController::class,'details'])->name('blog.details');
    Route::get('blog-list',           [HomeController::class,'list'])->name('blog.list');

    //social activites routes...
    Route::get('social-details/{slug}', [HomeController::class,'social_details'])->name('social.details');
    Route::get('social-list',           [HomeController::class,'social_list'])->name('social.list');

    //gallery routes...
    // Route::get('social-details/{slug}', [HomeController::class,'social_details'])->name('social.details');
    Route::get('gallery-list',          [HomeController::class,'gallery_list'])->name('gallery.list');

    //profile routes...
    Route::get('home/user-profile',     [HomeController::class,'profile'])->name('home.user.profile');
    Route::get('home/user-login',        [HomeController::class,'login'])->name('home.user.login');

    //job routes...
    //profile routes...
    Route::get('job-details/{slug}', [HomeController::class,'job_details'])->name('job.details');
    // Route::get('home/user-login', [HomeController::class,'login'])->name('home.user.login');

    //logout route....
    Route::get('user-logout', [HomeController::class,'destroy'])->name('user.logout');

    //contact us routes...
    Route::get('contact-us', [HomeController::class,'contact_us'])->name('contact.us');
    Route::post('contact-us-create', [HomeController::class,'contact_us_store'])->name('contact.us.create');
    
     //page routes...
    Route::get('page/{slug}', [HomeController::class,'show_page'])->name('page.show');
    // Route::post('contact-us-create', [HomeController::class,'contact_us_store'])->name('contact.us.create');

    //product by category routes..........
    // Route::get('{slug}', [HomeController::class,'product_by_category'])->name('product.by.category');

//frontend route end.....

// backend route.....
    Route::group(['prefix' => 'admin/','middleware' =>'guest'], function () {
    //login register route....

        Route::get('login',            [LoginController::class,'index'])->name('login');
        Route::get('register',         [LoginController::class,'create'])->name('register');
        Route::post('store',           [LoginController::class,'store'])->name('store');
        Route::post('user-login',      [LoginController::class,'login'])->name('user.login');
    });

        Route::group(['prefix' => 'admin/','middleware' => ['auth']], function () {
        // Route::group(['prefix' => 'admin/','middleware' => ['auth','user.role']], function () {
        Route::get('logout', [LoginController::class,'destroy'])->name('logout');
        Route::get('users', [LoginController::class,'get_user'])->name('get.user');
        Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');

        //end login register route....

        //menu routes ...
        Route::get('menu-list',    [MenuController::class,'index'])->name('menus');
        Route::post('menu-create', [MenuController::class,'store'])->name('store.menu');
        Route::post('menu-status', [MenuController::class,'status'])->name('menu.status');
        Route::post('menu-update', [MenuController::class,'update'])->name('update.menu');


        //category route...
            Route::get('categories', [CategoryController::class,'index'])->name('categories');
            Route::post('category-store', [CategoryController::class,'store'])->name('category.add');
            Route::post('category-update', [CategoryController::class,'update'])->name('category.update');
            Route::get('category-show/{id}', [CategoryController::class,'edit'])->name('show.category');
            Route::post('category-edit', [CategoryController::class,'update'])->name('category.update');
            Route::post('category-status', [CategoryController::class,'status'])->name('category.status');

        //banar route...
            Route::get('banar', [BannerController::class,'index'])->name('banar.list');
            Route::post('banar-upload', [BannerController::class,'store'])->name('banar.store');
            Route::post('banar-update', [BannerController::class,'update'])->name('banar.update');
            Route::post('banar-delete', [BannerController::class,'destroy'])->name('admin.banar.delete');

        //products route....
            Route::get('products', [ProductController::class,'index'])->name('products');
            Route::post('products-store', [ProductController::class,'store'])->name('product.store');
            Route::post('products-update', [ProductController::class,'update'])->name('product.update');

        //product avatar route....
            Route::get('product-avatars/{id}', [ProductAvatarController::class,'index'])->name('product.avatars');
            Route::post('product-avatar-store', [ProductAvatarController::class,'store'])->name('avatar.store');
            Route::post('avatar-update', [ProductAvatarController::class,'update'])->name('avatar.update');


        //sales routes....
        Route::get('sales',                 [ProductController::class,'sales'])->name('sales');
            Route::post('sales-delete', [ProductController::class,'sales_delete'])->name('sales.delete');

        //product attribute route
            Route::get('product-attributes',        [ProductAttributeController::class,'index'])->name('attributes');
            Route::post('product-attribute-update', [ProductAttributeController::class,'update'])->name('update.attribute');
            Route::post('product-attribute-create', [ProductAttributeController::class,'store'])->name('store.attribute');
        //product Order route
        Route::get('product-order',             [OrderController::class,'index'])->name('order');
        Route::post('product-attribute-update', [OrderController::class,'update'])->name('update.attribute');
        Route::post('product-attribute-create', [OrderController::class,'store'])->name('store.attribute');

        //clients routes...
    Route::get('clients',                   [ClientController::class,'index'])->name('clients');
    Route::post('client-add',               [ClientController::class,'store'])->name('client.add');
    Route::get('client-show/{id}',          [ClientController::class,'show'])->name('show.client');
    Route::post('client-update',            [ClientController::class,'update'])->name('client.update');
    Route::post('client-delete/{id}',       [ClientController::class,'destroy'])->name('client.delete');

        //blog routes...
        Route::get('blog', [BlogController::class,'index'])->name('blogs');
        Route::post('blog-add', [BlogController::class,'store'])->name('blog.add');
        Route::get('blog-show/{id}', [BlogController::class,'show'])->name('show.blog');
        Route::post('blog-update', [BlogController::class,'update'])->name('blog.update');
        Route::post('blog-delete/{id}', [BlogController::class,'destroy'])->name('blog.delete');

        //social activites routes...
        Route::get('socials', [SocialActivitesController::class,'index'])->name('socials');
        Route::post('social-add', [SocialActivitesController::class,'store'])->name('social.add');
        Route::get('social-show/{id}', [SocialActivitesController::class,'show'])->name('show.social');
        Route::post('social-update', [SocialActivitesController::class,'update'])->name('social.update');
        Route::post('social-delete/{id}', [SocialActivitesController::class,'destroy'])->name('social.delete');

        //gallery routes...
        Route::get('galleries', [GalleryController::class,'index'])->name('gallery');
        Route::post('gallery-add', [GalleryController::class,'store'])->name('gallery.add');
        // Route::get('social-show/{id}', [SocialActivitesController::class,'show'])->name('show.social');
        // Route::post('social-update', [SocialActivitesController::class,'update'])->name('social.update');
        Route::post('gallery/delete/{id}', [GalleryController::class,'destroy'])->name('image.delete');

        //setting routes...
            Route::get('setting', [SettingController::class,'index'])->name('setting');
            Route::post('setting-update', [SettingController::class,'store'])->name('settings.save');
        //

        //message routes...
        Route::get('message', [SettingController::class,'message'])->name('message');
        Route::post('message-update', [SettingController::class,'message_delete'])->name('message.delete');

        //message routes...
        Route::get('ads-list', [AdsController::class,'index'])->name('ads.list');
        Route::post('ads-post', [AdsController::class,'store'])->name('ads.store');
        Route::post('change-ads-status', [AdsController::class,'change_status'])->name('change.ads.status');
        Route::post('ads-update', [AdsController::class,'update'])->name('ads.update');
        
        
        //message routes...
        Route::get('pages', [DashboardController::class,'page'])->name('pages');
        Route::post('page-post', [DashboardController::class,'store'])->name('page.add');
        Route::post('change-page-status', [DashboardController::class,'change_status'])->name('change.page.status');
        Route::post('page-delete', [DashboardController::class,'destroy'])->name('page.delete');
        Route::get('page-show/{slug}', [DashboardController::class,'show'])->name('page.show');
        Route::post('page-update', [DashboardController::class,'update'])->name('page.update');
        
        //site meta routes...
        Route::get('site-meta-list', [SiteMetaController::class,'index'])->name('web-site-meta');
        Route::post('site-meta-post', [SiteMetaController::class,'store'])->name('meta.store');
        Route::post('site-meta-update', [SiteMetaController::class,'update'])->name('meta.update');
        Route::get('show-site-meta/{slug}', [SiteMetaController::class,'show'])->name('meta.show');
    //
    });


//end backend route.....

