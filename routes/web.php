<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SettingFacebookController;
use App\Http\Controllers\SMTPController;
use App\Http\Controllers\SettingGoogleController;
use App\Http\Controllers\SettingLanguageController;
use App\Http\Controllers\SettingThemeLinkController;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'isLogin'],function (){
    Route::get('/admin',[AuthController::class,'index']);
    Route::post('/admin',[AuthController::class,'Authcheck']);
});
Route::group(['middleware'=>'notLogin'],function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::group(['prefix' => '/dashboard'], function (){
        Route::get('/',[HomeController::class,'index']);
        Route::group(['prefix'=>'/users','as'=>'user.'],function ()
        {
            Route::get('/',[UserController::class,'index'])->middleware('permission:read-users');
            Route::get('/create',[UserController::class,'create'])->name('create')->middleware('permission:create-users');
            Route::post('/store',[UserController::class,'store'])->name('store')->middleware('permission:create-users');
            Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit')->middleware('permission:edit-users');
            Route::post('/update/{id}',[UserController::class,'update'])->name('update')->middleware('permission:edit-users');
            Route::get('/delete/{id}',[UserController::class,'destroy'])->name('delete')->middleware('permission:delete-users');
        });
        Route::group(['prefix'=>'/roles','as'=>'role.'],function ()
        {
            Route::get('/',[RoleController::class,'index'])->middleware('permission:read-roles');
            Route::get('/create',[RoleController::class,'create'])->name('create')->middleware('permission:create-roles');
            Route::post('/store',[RoleController::class,'store'])->name('store')->middleware('permission:create-roles');
            Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit')->middleware('permission:edit-roles');
            Route::post('/update/{id}',[RoleController::class,'update'])->name('update')->middleware('permission:edit-roles');
            Route::get('/delete/{id}',[RoleController::class,'destroy'])->name('delete')->middleware('permission:delete-roles');
        });
//        Route::group(['prefix'=>'/permissions','as'=>'permission.'],function ()
//        {
//            Route::get('/',[PermissionController::class,'index'])->name('index')->middleware('permission:read-permissions');
//            Route::get('/create',[PermissionController::class,'create'])->name('create')->middleware('permission:create-permissions');
//            Route::post('/store',[PermissionController::class,'store'])->name('store')->middleware('permission:create-permissions');
////            Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
////            Route::post('/update/{id}',[PermissionController::class,'update'])->name('update');
//            Route::get('/delete/{id}',[PermissionController::class,'destroy'])->name('delete')->middleware('permission:delete-permissions');
//        });
        Route::group(['prefix' => '/categories', 'as' => 'category.'], function ()
        {
            Route::get('/', [CategoryController::class, 'index'])->name('index')->middleware('permission:read-categories');
            Route::get('/create', [CategoryController::class, 'create'])->name('create')->middleware('permission:create-categories');
            Route::post('/store/', [CategoryController::class, 'store'])->name('store')->middleware('permission:create-categories');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit')->middleware('permission:edit-categories');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update')->middleware('permission:edit-categories');
            Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy')->middleware('permission:delete-categories');
        });
        Route::group(['prefix'=>'/pages','as'=>'page.'],function ()
        {
            Route::get('/', [PagesController::class, 'index'])->name('index')->middleware('permission:read-pages');
            Route::get('/create', [PagesController::class, 'create'])->name('create')->middleware('permission:create-pages');
            Route::post('/store/', [PagesController::class, 'store'])->name('store')->middleware('permission:create-pages');
            Route::get('/edit/{id}', [PagesController::class, 'edit'])->name('edit')->middleware('permission:edit-pages');
            Route::post('/update/{id}', [PagesController::class, 'update'])->name('update')->middleware('permission:edit-pages');
            Route::get('/delete/{id}', [PagesController::class, 'destroy'])->name('destroy')->middleware('permission:delete-pages');
            Route::get('{slug}',[PagesController::class,'show']);
        });
        Route::group(['prefix'=>'/blogs','as'=>'blog.'],function ()
        {
            Route::get('/',[BlogController::class,'index'])->name('index')->middleware('permission:read-blogs');
            Route::get('/add',[BlogController::class,'add'])->name('add')->middleware('permission:create-blogs');
            Route::post('/create',[BlogController::class,'create'])->name('create')->middleware('permission:create-blogs');
            Route::get('/edit/{id}',[BlogController::class,'edit'])->name('edit')->middleware('permission:edit-blogs');
            Route::post('/update/{id}',[BlogController::class,'update'])->name('update')->middleware('permission:edit-blogs');
            Route::get('/delete/{id}',[BlogController::class,'delete'])->name('delete')->middleware('permission:delete-blogs');
            Route::group(['prefix'=>'/galery'],function (){
                Route::get('/{id}',[BlogController::class,'galery'])->middleware('permission:read-galery');
                Route::delete('/imageDelete/{id}',[BlogController::class,'imageDelete'])->name('imageDelete')->middleware('permission:delete-galery');
                Route::get('/imageEdit/{id}',[BlogController::class,'imageEdit'])->name('imageEdit')->middleware('permission:edit-galery');
                Route::patch('/imageUpdate/{id}',[BlogController::class,'imageUpdate'])->name('imageUpdate')->middleware('permission:edit-galery');
                Route::post('/checkDelete/',[BlogController::class,'checkDelete'])->name('checkDelete')->middleware('permission:multi-delete-galery');
            });
        });
        Route::group(['prefix'=>'/tags','as'=>'tag.'],function (){
            Route::get('/',[TagController::class,'index'])->name('index');
            Route::get('/show/{name}',[TagController::class,'show'])->name('show');
//            Route::get('/create',[TagController::class,'create'])->name('create');
//            Route::post('/store',[TagController::class,'store'])->name('store');
//            Route::get('/edit/{id}',[TagController::class,'edit'])->name('edit');
//            Route::put('/update/{id}',[TagController::class,'update'])->name('update');
//            Route::get('/delete/{id}',[TagController::class,'delete'])->name('delete');
        });
        Route::group(['prefix'=>'/profile'],function ()
        {
            Route::get('/',[ProfileController::class,'edit']);
            Route::post('/update/{id}',[ProfileController::class,'update']);
        });
        Route::group(['prefix'=>'/settings','as'=>'setting.'],function ()
        {
            Route::get('/general',[SettingController::class,'index'])->name('index');
            Route::post('/general',[SettingController::class,'update'])->name('update');
            Route::get('/theme-links',[SettingThemeLinkController::class,'index'])->name('theme-index');
            Route::post('/theme-header',[SettingThemeLinkController::class,'headerCreate'])->name('theme-link-header');
            Route::post('/theme-footer',[SettingThemeLinkController::class,'footerCreate'])->name('theme-link-footer');
            Route::get('/theme-link-delete/{id}',[SettingThemeLinkController::class,'delete'])->name('theme-link-delete');
            Route::group(['prefix'=>'/facebook','as'=>'facebook.'],function (){
                Route::get('/',[SettingFacebookController::class,'index'])->name('index');
                Route::post('/update/{id}',[SettingFacebookController::class,'update'])->name('update');
            });
            Route::group(['prefix'=>'/google','as'=>'google.'],function (){
                Route::get('/',[SettingGoogleController::class,'index'])->name('index');
                Route::post('/update/{id}',[SettingGoogleController::class,'update'])->name('update');
            });
            Route::group(['prefix'=>'/smtp','as'=>'smtp.'],function (){
                Route::get('/',[SMTPController::class,'index'])->name('index');
                Route::post('/update/{id}',[SMTPController::class,'update'])->name('update');
            });
            Route::group(['prefix'=>'/languages','as'=>'language.'],function ()
            {
                Route::get('/',[SettingLanguageController::class,'index'])->name('index');
                Route::post('/create',[SettingLanguageController::class,'create'])->name('create');
                Route::get('/edit/{id}',[SettingLanguageController::class,'edit'])->name('edit');
                Route::post('/update/{id}',[SettingLanguageController::class,'update'])->name('update');
            });
        });
    });
});
