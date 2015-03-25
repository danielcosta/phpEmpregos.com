<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
//
//Route::get('home', 'HomeController@index');
//
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
//
//if ('production' != env('APP_ENV')) {
//    Route::get('test', function(){
//
////        xd(new phpEmpregos\Job\Job());
//
//    });
//}

// routes
Route::get('/'               , ['as' => 'home'            , 'uses' => 'HomeController@index'     ]);
Route::get('sobre'           , ['as' => 'sobre'           , 'uses' => 'AboutController@index'    ]);
Route::get('contato'         , ['as' => 'contato'         , 'uses' => 'ContactController@create' ]);
Route::get('feed/atom'       , ['as' => 'feed.atom'       , 'uses' => 'FeedController@atom'      ]);
Route::get('trovit_feed.xml' , ['as' => 'feed.trovit'     , 'uses' => 'FeedController@trovit'    ]);
Route::get('sitemap.xml'     , ['as' => 'sitemap.xml'     , 'uses' => 'SiteMapController@xml'    ]);
Route::get('vaga-{id}'       , ['as' => 'vaga.slug'       , 'uses' => 'JobController@show'       ]);
Route::post('enviar-cv'      , ['as' => 'enviarcv'        , 'uses' => 'JobController@sendCv'     ]);
Route::get('pesquisar-vagas' , ['as' => 'pesquisar.vagas' , 'uses' => 'JobController@index'      ]);
Route::get('cadastrar-vaga'  , ['as' => 'cadastrar.vaga'  , 'uses' => 'JobController@create'     ]);

// resources
Route::resource('vaga', 'JobController');