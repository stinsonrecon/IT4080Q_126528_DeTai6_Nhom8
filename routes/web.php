<?php

use App\Http\Controllers\AuthController\BankController;
use App\Http\Controllers\AuthController\Csvc_Pttt_Controller;
use App\Http\Controllers\AuthController\RegisterController;
use App\Http\Controllers\AuthController\NewController;
use App\Http\Controllers\UserController\HomeController;
use App\Http\Controllers\UserController\NewsController;
use App\Http\Controllers\UserController\PaymentMethodController;
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

Route::get('/', function () {
    return view('front-end.contents.home');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/aboutus', [PaymentMethodController::class,'aboutUs'])->name("aboutus");

Route::get('/payment_method', [PaymentMethodController::class,'paymentMethod'])->name("paymentMethod");

Route::get('/news', [NewsController::class, 'index'])->name("news");

Route::get('/shipping_policy', [PaymentMethodController::class,'shippingPolicy'])->name("shippingPolicy");

Route::get('/shopping_guide', function(){
    return view('front-end.contents.shoppingGuide');
})->name("shoppingGuide");

Route::get('/refund_regulation', function () {
    return view('front-end.contents.refundRegulation');
})->name('refundRegulation');

Route::get('/payment', [PaymentMethodController::class,'payment'])->name('payment');

Route::get('/contact', function(){
    return view('front-end.contents.contactMap');
})->name('contact');

Route::get('/news/{id}',[NewsController::class,'show']);

//back-end
Route::get('/admin',function(){
    return view('back-end.login');
});

//register
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

//login
Route::get('/login',[RegisterController::class, 'login'])->name('login');
Route::post('/login',[RegisterController::class, 'customerLogin']);

//logout
Route::get('/logout',[RegisterController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function(){
    //home
    Route::get('/home',function(){
        return view('back-end.contents.home');
    })->name('admin.home')->middleware('auth');

    //bank
    Route::prefix('bank')->group(function(){
        Route::get('/',[
            BankController::class,'index']
        )->name('bank.index');
        Route::get('/create', [
            BankController::class, 'create'
        ])->name('bank.create');
        Route::post('/store', [
            BankController::class, 'store'
        ])->name('bank.store');
        Route::get('/edit/{id}', [
            BankController::class, 'edit'
        ])->name('bank.edit');
        Route::post('/update/{id}', [
            BankController::class, 'update'
        ])->name('bank.update');
        Route::get('/delete/{id}', [
            BankController::class, 'delete'
        ])->name('bank.delete');
    });
    //product
    Route::prefix('product')->group(function(){
        Route::get('/',function(){
            return view('back-end.admin.product.product');
        })->name('product.product')->middleware('auth');
    });

    //promotion
    Route::prefix('promotion')->group(function(){
        Route::get('/',function(){
            return view('back-end.admin.product.promotion');
        })->name('product.promotion')->middleware('auth');
    });

    //order
    Route::prefix('order')->group(function(){
        Route::get('/',function(){
            return view('back-end.admin.order.order');
        })->name('order.order')->middleware('auth');
    });

    //orderDetail
    Route::prefix('orderDetail')->group(function(){
        Route::get('/',function(){
            return view('back-end.admin.order.orderDetail');
        })->name('order.orderDetail')->middleware('auth');
    });

    //new
    Route::prefix('news')->group(function(){
        Route::get('/',[
            NewController::class,'index'
        ])->name('new.index');
        Route::get('/create', [
            NewController::class, 'create'
        ])->name('new.create');
        Route::post('/store', [
            NewController::class, 'store'
        ])->name('new.store');
        Route::get('/edit/{id}', [
            NewController::class, 'edit'
        ])->name('new.edit');
        Route::post('/update/{id}', [
            NewController::class, 'update'
        ])->name('new.update');
        Route::get('/delete/{id}', [
            NewController::class, 'delete'
        ])->name('new.delete');
    });

    //chinh sach van chuyen va phuong thuc thanh toan
    Route::prefix('csvcandpttt')->group(function(){
        Route::get('/csvc',[
            Csvc_Pttt_Controller::class,'indexa'
        ])->name('a.index');
        Route::post('/csvc/store',[
            Csvc_Pttt_Controller::class,'storea'
        ])->name('a.store');
        Route::get('/pttt',[
            Csvc_Pttt_Controller::class,'indexb'
        ])->name('b.index');
        Route::post('/pttt/store',[
            Csvc_Pttt_Controller::class,'storeb'
        ])->name('b.store');
        Route::get('/vvct',[
            Csvc_Pttt_Controller::class,'indexc'
        ])->name('c.index');
        Route::post('/vvct/store',[
            Csvc_Pttt_Controller::class,'storec'
        ])->name('c.store');
        
    });
});