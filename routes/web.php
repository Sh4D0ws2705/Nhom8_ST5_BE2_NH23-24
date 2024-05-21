<?php

use App\Http\Controllers\admin\AdminPageController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\PageControl;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
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
// Route::get("/",function(){
//     return view("index");
// });

//Route::get("/{name?}",function($name = "index"){
//    return view(@$name);
//})->name('page');

// Route::get("crud", function(){
//     return view('crud');
// });
// // Route::get("/login",function(){
//     return view("login");
// });

//route cho web nguoi dung
Route::get("/{page?}", [PageControl::class, 'showPage'])->name('show.page');
//route cho trang admin
// Route::get("/admin/{page?}", [AdminPageController::class, 'showPageAdmin'])->name('show.pageAdmin');
Route::get('/admin/index', function () {
    return view('admin.index');
});

//route product
Route::get('/admin/product/list', [ProductController::class, 'listProduct'])->name('listProduct');
Route::post('/admin/product/add', [ProductController::class, 'insertProduct'])->name('insertProduct');
Route::get('/admin/product/create', [ProductController::class, 'addProduct']);
Route::get('/admin/product/delete', [ProductController::class, 'deleteProduct']);
Route::get('/admin/product/edit/{maSP}', [ProductController::class, 'editProduct'])->name('editProduct');
Route::post('/admin/product/edit/{maSP}', [ProductController::class, 'updateProduct'])->name('updateProduct');

//route menu
Route::get('/admin/category/create', [MenuController::class, 'addCategories']);
Route::get('/admin/category/delete', [MenuController::class, 'deleteCategories']);
Route::get('/admin/category/edit/{idDanhMuc}', [MenuController::class, 'editCategories'])->name('editCategory');
Route::post('/admin/category/edit/{idDanhMuc}', [MenuController::class, 'updateCategories'])->name('updateCategory');
Route::get('/admin/category/list', [MenuController::class, 'listCategories'])->name('listCategory');
Route::post('/admin/category/add', [MenuController::class, 'insertCategories'])->name('insertMenu');



// route lấy đường dẫn hình
Route::post('/upload', [UploadController::class, 'uploadImage']); //lấy 1 ảnh đại diện
Route::post('/uploads', [UploadController::class, 'uploadImages']); //lấy nhiều ảnh sp

Route::get('/detail/{maSP}', [PageControl::class, 'showDetail'])->name('detail');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/category/{idDanhMuc}', [PageControl::class, 'getProductByCategory'])->name('category.products');

Route::middleware('auth')->group(function () {
    // -------Profile-----------
    Route::get('update_my_profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('update_my_profile/{id}', [ProfileController::class, 'updateProfile'])->name('update_profile');
    Route::delete('update_my_profile/{id}/delete', [ProfileController::class, 'destroyProfile'])->name('destroy_profile');
    Route::post('change_password', [ProfileController::class, 'changePassword'])->name('change_password');
});
