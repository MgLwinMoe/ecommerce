<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CardComponent;
use App\Http\Livewire\CheckOutComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\EditAdminCategoryComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/card', CardComponent::class)->name('product.card');
Route::get('/checkout', CheckOutComponent::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product_cateory/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist.show');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function (){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/adming/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/adming/category/edit/{category_slug}', EditAdminCategoryComponent::class)->name('admin.editcategory');
    Route::get('/adming/product', AdminProductComponent::class)->name('admin.product');
    Route::get('/adming/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/adming/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    // Admin Home Sliders
    Route::get('/adming/slider', AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/adming/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addslider');
    Route::get('/adming/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.editslider');

    // Admin Categories
    Route::get('/adming/categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/adming/sales', AdminSaleComponent::class)->name('admin.sales');




});

// For User

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
