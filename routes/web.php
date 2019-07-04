<?php

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

Route::group([], function () {

    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    Route::get('page/{alias}', ['uses'=>'PageController@execute', 'as'=>'page']);

    Route::auth();


});

Route::group(['prefix'=>'admin', 'middleware'=> 'auth'], function () {

    Route::get('/', function() {

        if(view()->exists('admin.index')){
            $data = [
              'title'=>'Admin Dashboard'
            ];

            return view('admin.index', $data);
        }


    })->name('admin');

    Route::group(['prefix'=>'pages'], function () {

        Route::get('/', ['uses'=>'Admin\Pages\PagesController@execute', 'as'=>'pages']);
        Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Pages\PagesAddController@execute', 'as'=>'pageAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses'=>'Admin\Pages\PagesEditController@execute', 'as'=>'pageEdit']);

    });

    Route::group(['prefix'=>'portfolio'], function () {

        Route::get('/', ['uses'=>'Admin\Portfolio\PortfolioController@execute', 'as'=>'portfolio']);
        Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Portfolio\PortfolioAddController@execute', 'as'=>'portfolioAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses'=>'Admin\Portfolio\PortfolioEditController@execute', 'as'=>'portfolioEdit']);

    });

    Route::group(['prefix'=>'services'], function () {

        Route::get('/', ['uses'=>'Admin\Services\ServiceController@execute', 'as'=>'services']);
        Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Services\ServiceAddController@execute', 'as'=>'serviceAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses'=>'Admin\Services\ServiceEditController@execute', 'as'=>'serviceEdit']);

    });

    Route::group(['prefix'=>'workers'], function () {

        Route::get('/', ['uses'=>'Admin\Workers\WorkerController@execute', 'as'=>'workers']);
        Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Workers\WorkerAddController@execute', 'as'=>'workerAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{worker}', ['uses'=>'Admin\Workers\WorkerEditController@execute', 'as'=>'workerEdit']);

    });

    Route::group(['prefix'=>'clients'], function () {

        Route::get('/', ['uses'=>'Admin\Clients\ClientController@execute', 'as'=>'clients']);
        Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Clients\ClientAddController@execute', 'as'=>'clientAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{client}', ['uses'=>'Admin\Clients\ClientEditController@execute', 'as'=>'clientEdit']);

    });

    Route::group(['prefix'=>'contacts'], function () {

        Route::get('/', ['uses'=>'Admin\Contacts\ContactController@execute', 'as'=>'contacts']);
        Route::match(['get', 'post'], '/add', ['uses'=>'Admin\Contacts\ContactAddController@execute', 'as'=>'contactAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{contact}', ['uses'=>'Admin\Contacts\ContactEditController@execute', 'as'=>'contactEdit']);

    });

});

