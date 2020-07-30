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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('/cv-rank', 'FileextractorController@rankCV');
// Route::post('/quick-rank', 'CVRankingController@rankCV');
// Route::post('/cv-post', 'FileextractorController@cvUpload');
// Route::post('/cv-delete', 'FileextractorController@deleteCV');



// Route::get('/extract-pdf', 'FileextractorController@extractPdf');
// Route::get('/extract-word', 'FileextractorController@extractWord');


Route::group(['middleware' => 'localization'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/ranking', 'CVRankingController@index')->name('ranking');
    Route::post('/ranking', 'CVRankingController@rankCV');
    Route::get('/ranking-detail', 'CVRankingController@PointDetail')->name('ranking-detail');


    Route::get('/quick-ranking', 'QuickRankingController@index')->name('quick-ranking');
    Route::post('/quick-ranking', 'QuickRankingController@rankCV');
    Route::get('/quick-ranking-detail', 'QuickRankingController@PointDetail')->name('quick-ranking-detail');

    Route::get('/cv-list', 'CVCollectionController@index')->name('cv-list');
    Route::post('/cv-delete', 'CVCollectionController@deleteCV');
    Route::post('/cv-clear', 'CVCollectionController@clearCV');

    Route::get('/cv-upload', 'CVCollectionController@cvFormRaw')->name('cv-upload');
    Route::post('/cv-upload', 'CVCollectionController@cvUploadRaw');

    Route::get('/keyword-parsing', 'KeywordParsingController@index')->name('keyword-parsing');
    Route::post('/keyword-parsing', 'KeywordParsingController@keyParsing');
    Auth::routes();
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/upload_language', 'SettingController@uploadLanguagesIndex')->name('upload_language');
        Route::post('/upload_language', 'SettingController@uploadLanguages')->name('upload_language');
        Route::post('/download-zip', 'CVCollectionController@downloadZip')->name('download-zip');
        Route::post('/download-language', 'SettingController@downloadLanguage')->name('download-language');
    });
    
    Route::get('/menu-management', 'MenuManagementController@index')->name('menu-management');
    Route::get('/menu-management/show', 'MenuManagementController@show')->name('menu-management/show');
    Route::get('/menu-management/add', 'MenuManagementController@add')->name('menu-management/add');
    Route::post('/menu-management/add', 'MenuManagementController@add')->name('menu-management/add');
    Route::get('/menu-management/edit', 'MenuManagementController@edit')->name('menu-management/edit');
    Route::post('/menu-management/edit', 'MenuManagementController@edit')->name('menu-management/edit');
    Route::post('/menu-management/delete', 'MenuManagementController@delete')->name('menu-management/delete');
    
    Route::get('/catagory-management', 'CatagoryManagementController@index')->name('catagory-management');
    Route::get('/catagory-management/show', 'CatagoryManagementController@show')->name('catagory-management/show');
    Route::get('/catagory-management/add', 'CatagoryManagementController@add')->name('catagory-management/add');
    Route::post('/catagory-management/add', 'CatagoryManagementController@add')->name('catagory-management/add');
    Route::get('/catagory-management/edit', 'CatagoryManagementController@edit')->name('catagory-management/edit');
    Route::post('/catagory-management/edit', 'CatagoryManagementController@edit')->name('catagory-management/edit');
    Route::post('/catagory-management/delete', 'CatagoryManagementController@delete')->name('catagory-management/delete');
    
    Route::get('/post-management', 'postManagementController@index')->name('post-management');
    Route::get('/post-management/show', 'postManagementController@show')->name('post-management/show');
    Route::get('/post-management/add', 'postManagementController@add')->name('post-management/add');
    Route::post('/post-management/add', 'postManagementController@add')->name('post-management/add');
    Route::get('/post-management/edit', 'postManagementController@edit')->name('post-management/edit');
    Route::post('/post-management/edit', 'postManagementController@edit')->name('post-management/edit');
    Route::post('/post-management/delete', 'postManagementController@delete')->name('post-management/delete');
    
    Route::get('/getCatagoryByMenuId', 'CatagoryManagementController@getCatagoryByMenuId')->name('getCatagoryByMenuId');
    
    Route::get('/upload-image', 'UploadImageController@index')->name('upload-image');
    Route::post('/upload-image/upload', 'UploadImageController@upload')->name('upload-image/upload');
    Route::get('/upload-image/upload', 'UploadImageController@upload')->name('upload-image/upload');
    Route::get('/', 'HomeController@index')->name('/');
    
});

    Route::get('change-language/{language}', 'SettingController@changeLanguage')->name('user.change-language');



