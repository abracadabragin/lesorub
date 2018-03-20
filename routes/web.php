<?php


Route::get('/', 'ProductController@index')->name('index');

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::get('products/create', 'ProductController@create')->name('createProduct');
Route::post('products/create', 'ProductController@store')->name('storeProduct');
Route::get('products/{product}/show', 'ProductController@show')->name('showProduct');
Route::get('products/{product}/edit', 'ProductController@edit')->name('editProduct');
Route::patch('products/{product}', 'ProductController@update')->name('updateProduct');
Route::delete('products/{product}/delete', 'ProductController@destroy')->name('deleteProduct');

Route::get('feedbacks/create', 'FeedbackController@create')->name('createFeedback');
Route::post('feedbacks/create', 'FeedbackController@store')->name('storeFeedback');
Route::get('feedbacks/{feedback}/show', 'FeedbackController@show')->name('showFeedback');
Route::get('feedbacks/{feedback}/edit', 'FeedbackController@edit')->name('editFeedback');
Route::patch('feedbacks/{feedback}', 'FeedbackController@update')->name('updateFeedback');
Route::delete('feedbacks/{feedback}/delete', 'FeedbackController@destroy')->name('deleteFeedback');

Route::post('form/send', 'FormController@sendMessage')->name('sendMessage');