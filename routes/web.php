<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('connexion', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('connexion', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('deconnexion', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

Route::post('mot-de-passe/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);

Route::get('mot-de-passe/reinitialisation', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);

Route::post('mot-de-passe/reinitialisation', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);

Route::get('mot-de-passe/reinitialisation/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::get('inscription', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('inscription', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductController@index')->name('products.index');

Route::get('product/{productId}', 'ProductController@show')->name('products.show');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::post('products/store', 'ProductController@store')->name('products.store');

Route::get('products/edit/{productId}', 'ProductController@edit')->name('products.edit');

Route::get('products/update/{productId}', 'ProductController@update')->name('products.update');

Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');

Route::get('/videpanier', function () {
    Cart::destroy();
    return redirect()->back();
})->name('cart.videpanier');

Route::get('/panier', 'CartController@index')->name('cart.index');

Route::delete('/panier/{rowId}' ,'CartController@destroy')->name('cart.destroy');

Route::get('/paiement', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
