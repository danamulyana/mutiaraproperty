<?php

use App\Http\Livewire\Dashboard\Admim\UserAdd;
use App\Http\Livewire\Dashboard\Admim\UserEdit;
use App\Http\Livewire\Dashboard\Admim\Users;
use App\Http\Livewire\Dashboard\Categories;
use App\Http\Livewire\Dashboard\CategoriesAdd;
use App\Http\Livewire\Dashboard\CategoriesEdit;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Dashboard\DiscoverAdd;
use App\Http\Livewire\Dashboard\DiscoverEdit;
use App\Http\Livewire\Dashboard\DiscoverList;
use App\Http\Livewire\Dashboard\DiscoverListAdd;
use App\Http\Livewire\Dashboard\DiscoverListEdit;
use App\Http\Livewire\Dashboard\Discovers;
use App\Http\Livewire\Dashboard\EmailSubscriber;
use App\Http\Livewire\Dashboard\Explore as DashboardExplore;
use App\Http\Livewire\Dashboard\ExploreAdd;
use App\Http\Livewire\Dashboard\ExploreEdit;
use App\Http\Livewire\Home\Discover;
use App\Http\Livewire\Dashboard\HomeEdit;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Home\News;
use App\Http\Livewire\Dashboard\HomeSlider;
use App\Http\Livewire\Dashboard\HomeSliderAdd;
use App\Http\Livewire\Dashboard\HomeSliderEdit;
use App\Http\Livewire\Dashboard\Pengunjung;
use App\Http\Livewire\Dashboard\PostAdd;
use App\Http\Livewire\Dashboard\PostEdit;
use App\Http\Livewire\Dashboard\Posts;
use App\Http\Livewire\Dashboard\ProductAdd;
use App\Http\Livewire\Dashboard\ProductEdit;
use App\Http\Livewire\Dashboard\Products;
use App\Http\Livewire\Dashboard\ProfileUpdatePassword;
use App\Http\Livewire\Dashboard\PromoAdd;
use App\Http\Livewire\Dashboard\PromoEdit;
use App\Http\Livewire\Dashboard\Promos;
use App\Http\Livewire\Dashboard\SettingSite;
use App\Http\Livewire\Dashboard\UserProfile;
use App\Http\Livewire\Home\Explore;
use App\Http\Livewire\Home\NewsDetail;
use App\Http\Livewire\Home\Promo;
use Illuminate\Support\Facades\Route;

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
Route::middleware('visitor')->group(function() {
    Route::get('/', Home::class)->name('home');
    Route::get('/discover-lifestyle/{discover_slug}', Discover::class)->name('discover');
    Route::get('/news', News::class)->name('news');
    Route::get('/news/{news_slug}', NewsDetail::class)->name('news.detail');
    Route::get('/promo', Promo::class)->name('promo');
    Route::get('/explore-product/{explore_slug}', Explore::class)->name('explore-product');
});


// admin & dashboard

Route::middleware(['auth:sanctum', 'verified'])->group( function(){

    Route::prefix('dashboard')->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::get('/settings', SettingSite::class)->name('setting');
        Route::get('/user/profile', UserProfile::class )->name('user.setting');
        Route::get('/user/profile/updatepassword', ProfileUpdatePassword::class)->name('user.updatepassword');
        Route::get('/data-pengujung', Pengunjung::class)->name('datapengunjung');
        Route::get('/data-subscribers', EmailSubscriber::class)->name('datasubscribers');

        Route::middleware(['admin'])->group( function () {
            Route::get('/admin/users', Users::class)->name('admin.users');
            Route::get('/admin/user/add', UserAdd::class)->name('admin.user.add');
            Route::get('/admin/user/permision/edit/{user_id}', UserEdit::class)->name('admin.user.edit');
        });

        Route::prefix('/chat')->group(function () {
            Route::get('/', function(){
                return redirect('https://dashboard.tawk.to/');
            })->name('chat.admin');
        });

        Route::prefix('/home-edit')->group(function () {
            Route::get('/', HomeEdit::class)->name('home.edit');
            Route::get('slider', HomeSlider::class)->name('home.slider');
            Route::get('slider/add', HomeSliderAdd::class)->name('home.slider.add');
            Route::get('slider/edit/{slider_id}', HomeSliderEdit::class)->name('home.slider.edit');
        });

        Route::prefix('/news')->group(function () {
            Route::get('/categories', Categories::class)->name('category');
            Route::get('/categories/add', CategoriesAdd::class)->name('category.add');
            Route::get('/categories/edit/{category_id}', CategoriesEdit::class)->name('category.edit');
            
            Route::get('/posts', Posts::class)->name('posts');
            Route::get('/post/add', PostAdd::class)->name('post.add');
            Route::get('/post/edit/{post_id}', PostEdit::class)->name('post.edit');
        });

        Route::prefix('/promo')->group(function () {
            Route::get('/', Promos::class)->name('promos');
            Route::get('/add', PromoAdd::class)->name('promo.add');
            Route::get('/edit/{promo_id}', PromoEdit::class)->name('promo.edit');
        });

        Route::prefix('/discovers')->group(function() {
            Route::get('/', Discovers::class)->name('discovers');
            Route::get('/add', DiscoverAdd::class)->name('discover.add');
            Route::get('/edit/{discover_id}', DiscoverEdit::class)->name('discover.edit');
            
            Route::get('/list', DiscoverList::class)->name('discovers.list');
            Route::get('/addList', DiscoverListAdd::class)->name('discoverlist.add');
            Route::get('/editList/{discoverList_id}', DiscoverListEdit::class)->name('discoverlist.edit');
        });

        Route::prefix('/explore')->group(function() {
            Route::get('/', DashboardExplore::class)->name('explores');
            Route::get('/add', ExploreAdd::class)->name('explore.add');
            Route::get('/edit/{explore_id}', ExploreEdit::class)->name('explore.edit');
            
            Route::get('/products', Products::class)->name('products');
            Route::get('/product/add', ProductAdd::class)->name('product.add');
            Route::get('/product/edit/{product_id}', ProductEdit::class)->name('product.edit');
        });
    });
});
