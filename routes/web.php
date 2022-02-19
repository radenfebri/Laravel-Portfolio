<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\AssignPermissionController;
use App\Http\Controllers\Backend\AssignRoleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategorieController;
use App\Http\Controllers\Backend\CategorieProductController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ProfileUserController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
// use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// HALAMAN FRONTEND HOME
Route::get('/', [FrontendController::class, 'index'])->name('user.index');

// HALAMAN FRONTEND STORE
Route::get('store', [FrontendController::class, 'store'])->name('store.index');
Route::get('product-list', [FrontendController::class, 'search']);
Route::post('searchproduct', [FrontendController::class, 'searchproduct'])->name('searchproduct');
Route::get('categorie-product/{slug}', [FrontendController::class, 'viewcategorie'])->name('viewcategorie.index');
Route::get('categorie-product/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview'])->name('productview.index');

// HALAMAN FRONTEND BLOG
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/categorie/{slug}', [BlogController::class, 'categorie'])->name('blog.categorie');
Route::get('/blog/detail/{slug}', [BlogController::class, 'detail'])->name('detail');
Route::get('/blog/author/{username}', [BlogController::class, 'author'])->name('author');
Route::get('artikel-list', [BlogController::class, 'search']);
Route::post('searchartikel', [BlogController::class, 'searchartikel'])->name('searchartikel');
Route::post('/comment/{artikel}', [CommentController::class, 'store'])->name('comment.store');


// ADD TO CART
Route::post('add-to-cart', [CartController::class, 'addProduct'])->name('addcart');

// ADD TO WISHLITS
Route::post('add-to-wishlist', [WishlistController::class, 'add'])->name('addwishlist');

// REMOVE CART LIST
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);

// REMOVE WISH LIST
Route::post('delete-wishlist-item', [WishlistController::class, 'deletewishlist']);

// UPDATE CART
Route::post('update-cart', [CartController::class, 'updatecart']);

// CART COUNT
Route::get('/load-cart-data',[CartController::class, 'cartcount']);

// WISHLIST COUNT
Route::get('/load-wishlist-data', [WishlistController::class, 'wishlistcount']);


Route::middleware(['has.role'])->middleware('auth')->group(function (){
    // ROUTE CATEGORIE PRODUCT
    Route::resource('categorieproduct', CategorieProductController::class);

    // ROUTE PRODUCT
    Route::resource('product', ProductController::class);

    // ROUTE CART LIST
    Route::get('cart', [CartController::class, 'cartview'])->name('cartview.index');

    // ROUTE WISHLIST
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    // ROUTE CHECKOUT
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    // ROUTE PLACE ORDER
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

    // ROUTE MIDTRANS
    Route::get('place-order-midtrans', [CheckoutController::class, 'midtrans']);

    // ROUTE CEK ORDER
    Route::get('my-orders', [OrderController::class, 'index'])->name('myorder.index');

    // ROUTE VIEW ORDER
    Route::get('view-orders/{id}', [OrderController::class, 'view'])->name('vieworders');

    // ROUTE ADD RATING
    Route::post('add-rating', [RatingController::class, 'add'])->name('rating');

    // ROUTE REVIEW PRODUCT
    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add'])->name('review');

    // ROUTE POST REVIEW PRODUCT
    Route::post('add-review', [ReviewController::class, 'create']);

    // ROUTE EDIT REVIEW PRODUCT
    Route::get('review-edit/{product_slug}/userreview', [ReviewController::class, 'edit']);

    // ROUTE UPDATE REVIEW PRODUCT
    Route::put('update-review', [ReviewController::class, 'update']);
});


Auth::routes();


Route::middleware(['has.role'])->middleware('auth')->group(function (){
    // DASHBOARD
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ROUTE FOR ARTICLE
    Route::resource('article', ArticleController::class);
    Route::resource('categorie', CategorieController::class);

    // ROUTE ADMIN ORDER
    Route::resource('orders', BackendOrderController::class);
    Route::get('orders-completed', [BackendOrderController::class, 'completed'])->name('completed.index');

    // ROLE USER
    Route::get('role/trash', [RoleController::class, 'trash'])->name('role.trash');
    Route::get('role/restore/{id?}', [RoleController::class, 'restore'])->name('role.restore');
    Route::get('role/delete/{id?}', [RoleController::class, 'delete'])->name('role.delete');
    Route::resource('role', RoleController::class);

    // ROLE PERMISSION
    Route::get('permission/trash', [PermissionController::class, 'trash'])->name('permission.trash');
    Route::get('permission/restore/{id?}', [PermissionController::class, 'restore'])->name('permission.restore');
    Route::get('permission/delete/{id?}', [PermissionController::class, 'delete'])->name('permission.delete');
    Route::resource('permission', PermissionController::class);

    // ASSIGN PERMISSION TO ROLE
    Route::get('assignpermission', [AssignPermissionController::class, 'index'])->name('assignpermission.index');
    Route::post('assignpermission', [AssignPermissionController::class, 'store'])->name('assignpermission.index');
    Route::get('assignpermission/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assignpermission.edit');
    Route::put('assignpermission/{role}/edit', [AssignPermissionController::class, 'update']);

    // ASSIGN ROLE TO USER
    Route::get('assignrole', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::post('assignrole', [AssignRoleController::class, 'store'])->name('assignrole.index');
    Route::get('assignrole/{user}/edit', [AssignRoleController::class, 'edit'])->name('assignrole.edit');
    Route::put('assignrole/{user}/edit', [AssignRoleController::class, 'update']);

    // MANAJEMEN USER
    Route::get('editpassword/{user}/edit', [UserController::class, 'editpassword'])->name('editpassword');
    Route::put('editpassword/{user}/edit', [UserController::class, 'updatepassword'])->name('updatepassword');
    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::get('users/restore/{id?}', [UserController::class, 'restore'])->name('users.restore');
    Route::get('users/delete/{id?}', [UserController::class, 'delete'])->name('users.delete');
    Route::resource('users', UserController::class);

    // SETTING PROFILE
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('setting-profile', [ProfileUserController::class, 'index'])->name('userprofile.index');
    Route::put('setting-profile', [ProfileUserController::class, 'update'])->name('userprofile.update');

    // LOG USER
    Route::resource('log', LogController::class);
});

// VIEW PROFILE PUBLIC
Route::get('{username:username}', [ProfileController::class, 'show'])->name('show');


