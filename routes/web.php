<?php

Route::get('/', 'HomeController@index');

Route::post('/daftar', 'MemberController@daftar')->name('daftar');

Route::middleware('auth')->group(function(){

	Route::resource('bank', 'BankController')->except('show');
	Route::resource('marketplace', 'MarketplaceController')->except('show');
	Route::resource('member', 'MemberController')->except('create', 'store', 'edit', 'update', 'show');
	Route::resource('jadwal', 'JadwalController')->except('show');
	Route::get('/jadwal/{jadwal}', 'JadwalController@getData');
	Route::resource('order', 'OrderController')->except('show');
	Route::get('/order/export-excel', 'OrderController@excel');
	Route::get('/bayar/{order}', 'OrderController@bayar')->name('order.bayar');
	Route::get('/diterima/{order}', 'OrderController@diterima')->name('order.diterima');
	Route::post('/bayar/{order}', 'OrderController@bayarStore')->name('bayar.store');
	Route::get('/keluar', 'Auth\LoginController@keluar')->name('keluar');
	Route::get('/member/verifikasi/{member}', 'MemberController@verifikasi')->name('member.verifikasi');
	Route::get('/profil', 'ProfilController@index')->name('profile');
	Route::put('/profil', 'ProfilController@update')->name('profile.update');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function(){
	return redirect('/');
});
