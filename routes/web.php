<?php

use App\Http\Controllers\testControllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\kitapController;
use App\Http\Controllers\xController;
use App\Http\Controllers\admin\indexController;
use App\Http\Controllers\admin\kateqori\kateqoriIndexController;
use App\Http\Controllers\admin\yayinevi\adminIndexController;
use App\Http\Controllers\admin\yazar\yazarIndexController;
use App\Http\Controllers\admin\kitab\kitabIndexController;
use App\Http\Controllers\admin\slider\sliderIndexController;
use App\Http\Controllers\api\productApiController;
use App\Http\Controllers\front\basket\basketIndexController;
use App\Http\Controllers\front\frontIndexController;
use App\Http\Controllers\front\cat\catIndexController;
use App\Http\Controllers\front\kitap\frontKitapIndexController;
use App\Http\Controllers\front\search\searchIndexController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\card\addBookCardController;
use App\Http\Controllers\comment\commentController;
use Illuminate\Support\Facades\Request;
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



Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email'])->name('dashboard');
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::get('/', [frontIndexController::class, 'index'])->name('index');
Route::get('/kateqori/{selflink}', [catIndexController::class, 'index'])->name('cat');
Route::get('/search', [searchIndexController::class, 'index'])->name('search');
Route::get('/contact', [ContactUsFormController::class, 'createForm'])->name('contact');
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
Route::get('/kitap/detay/{selflink}', [frontKitapIndexController::class, 'index'])->name('kitap.detay');
Route::post('ktap/{id}/comment', [frontKitapIndexController::class, 'store'])->name('books.store_comment');




Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'AdminKontrol',]], function () {
    Route::get('/', [indexController::class, 'index'])->name('index');
    Route::group(['as' => 'yayinevi.', 'prefix' => 'yayinevi'], function () {
        Route::get('/', [adminIndexController::class, 'index'])->name('index');
        Route::get('/ekle', [adminIndexController::class, 'create'])->name('create');
        Route::post('/ekle', [adminIndexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}', [adminIndexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}', [adminIndexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}', [adminIndexController::class, 'delete'])->name('delete');
    });
    Route::group(['as' => 'yazar.', 'prefix' => 'yazar'], function () {
        Route::get('/', [yazarIndexController::class, 'index'])->name('index');
        Route::get('/ekle', [yazarIndexController::class, 'create'])->name('create');
        Route::post('/ekle', [yazarIndexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}', [yazarIndexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}', [yazarIndexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}', [yazarIndexController::class, 'delete'])->name('delete');
    });
    Route::group(['as' => 'kitab.', 'prefix' => 'kitab'], function () {
        Route::get('/', [kitabIndexController::class, 'index'])->name('index');
        Route::get('/ekle', [kitabIndexController::class, 'create'])->name('create');
        Route::post('/ekle', [kitabIndexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}', [kitabIndexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}', [kitabIndexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}', [kitabIndexController::class, 'delete'])->name('delete');
    });

    Route::group(['as' => 'kateqori.', 'prefix' => 'kateqori'], function () {
        Route::get('/', [kateqoriIndexController::class, 'index'])->name('index');
        Route::get('/ekle', [kateqoriIndexController::class, 'create'])->name('create');
        Route::post('/ekle', [kateqoriIndexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}', [kateqoriIndexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}', [kateqoriIndexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}', [kateqoriIndexController::class, 'delete'])->name('delete');
    });
    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
        Route::get('/', [sliderIndexController::class, 'index'])->name('index');
        Route::get('/ekle', [sliderIndexController::class, 'create'])->name('create');
        Route::post('/ekle', [sliderIndexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}', [sliderIndexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}', [sliderIndexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}', [sliderIndexController::class, 'delete'])->name('delete');
    });
});


// Ajax test

Route::get('/ajax', function () {
    return view('ajax.test');
});
Route::post('/ajax/post', function () {

    return 'salam';
})->name('ajax.post');


Route::group(['as' => 'api.', 'prefix' => 'api'], function () {
    Route::get('product-list', [productApiController::class, 'index'])->name('product_list');
    Route::get('store', [productApiController::class, 'create'])->name('book.create');

    Route::post('store', [productApiController::class, 'store'])->name('book.store');
    Route::get('/product/{id}', [productApiController::class, 'show'])->name('book.show');
    Route::get('/update/{id}', [productApiController::class, 'edit'])->name('book.edit');

    Route::post('/update/{id}', [productApiController::class, 'update'])->name('book.edit.post');
    Route::get('/delete/{id}', [productApiController::class, 'destroy'])->name('book.delete');
});

Route::group(['as'=>'card.','prefix'=>'card'],function(){
    Route::get('',[addBookCardController::class,'index'])->name('card_product_list');
    Route::get('add/{id}',[addBookCardController::class,'index'])->name('add_product_card');
});
