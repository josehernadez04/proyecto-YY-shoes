<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModulesAndSubmodulesController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

    if (Auth::check()) {
        return redirect('/Dashboard');
    } else {
        return redirect('/login');
    }

});

Route::get('reset-password/{id}/{token}', [ResetPasswordController::class, 'showResetForm']);

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {

    Route::prefix('/Dashboard')->group(function () {

        Route::controller(HomeController::class)->group(function () {
            Route::get('/', 'index')->middleware('can:Dashboard,Dashboard')->name('Dashboard');
        });

        Route::prefix('/Users')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/Index', 'index')->name('users.index');
                Route::get('/Create', 'create')->name('users.create');
                Route::post('/Store', 'store')->name('users.store');
                Route::get('/Edit/{id}', 'edit')->name('users.edit');
                Route::put('/Update/{id}', 'update')->name('users.update');
                Route::delete('/Delete/{id}', 'delete');
            });
        });

        Route::prefix('/Clients')->group(function () {
            Route::controller(ClientController::class)->group(function () {
                Route::get('/Index', 'index')->name('Clients.Index');
                Route::get('/Create', 'create')->name('Clients.Create');
                Route::post('/Store', 'store')->name('Clients.Store');
                Route::get('/Edit/{id}', 'edit')->name('Clients.Edit');
                Route::put('/Update/{id}', 'update')->name('Clients.Update');
                Route::delete('/Delete', 'delete')->name('Clients.Delete');
            });

        });

        Route::prefix('/Categories')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/Index', 'index')->name('Categories.Index');
                Route::get('/Create', 'create')->name('Categories.Create');
                Route::post('/Store', 'store')->name('Categories.Store');
                Route::get('/Edit/{id}', 'edit')->name('Categories.Edit');
                Route::put('/Update/{id}', 'update')->name('Categories.Update');
                Route::delete('/Delete', 'delete')->name('Dashboard.Categories.Delete');
            });

        });

        Route::prefix('/Providers')->group(function () {
            Route::controller(ProviderController::class)->group(function () {
                Route::get('/Index', 'index')->name('Providers.Index');
                Route::get('/Create', 'create')->name('Providers.Create');
                Route::post('/Store', 'store')->name('Providers.Store');
                Route::get('/Edit/{id}', 'edit')->name('Providers.Edit');
                Route::put('/Update/{id}', 'update')->name('Providers.Update');
                Route::delete('/Delete', 'delete')->name('Providers.Delete');
            });

        });

        Route::prefix('/TypeDocuments')->group(function () {
            Route::controller(TypeDocumentController::class)->group(function () {
                Route::get('/Index', 'index')->name('TypeDocuments.Index');
                Route::get('/Create', 'create')->name('TypeDocuments.Create');
                Route::post('/Store', 'store')->name('TypeDocuments.Store');
                Route::get('/Edit/{id}', 'edit')->name('TypeDocuments.Edit');
                Route::put('/Update/{id}', 'update')->name('TypeDocuments.Update');
                Route::delete('/Delete/{id}', 'delete')->name('TypeDocuments.Delete');
            });
        });

        Route::prefix('/Products')->group(function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('/Index', 'index')->name('Products.Index');
                Route::get('/Create', 'create')->name('Products.Create');
                Route::post('/Store', 'store')->name('Products.Store');
                Route::get('/Edit/{id}', 'edit')->name('Products.Edit');
                Route::put('/Update/{id}', 'update')->name('Products.Update');
                Route::delete('/Delete', 'delete')->name('Products.Delete');
            });
        });

        Route::prefix('/Sales')->group(function(){
            Route::controller(SalesController::class)->group(function(){
                Route::get('/Index','index')->name('Sales.Index');
                Route::get('/Create','create')->name('Sales.Create');
                Route::post('/Store','store')->name('Sales.Store');
                Route::get('/Edit/{id}', 'edit')->name('Sales.Edit');
                Route::put('/Update/{id}', 'update')->name('Sales.Update'); 
                Route::delete('/Delete','delete')->name('Sales.Delete');
            });
        });

    });



    /*Route::prefix('/Users')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/Index', 'index')->middleware('can:Users,Dashboard.Users.Index')->name('Dashboard.Users.Index');
            Route::post('/Index/Query', 'indexQuery')->middleware('can:Users,Dashboard.Users.Index.Query')->name('Dashboard.Users.Index.Query');
            Route::post('/Create', 'create')->middleware('can:Users,Dashboard.Users.Create')->name('Dashboard.Users.Create');
            Route::post('/Store', 'store')->middleware('can:Users,Dashboard.Users.Store')->name('Dashboard.Users.Store');
            Route::post('/Edit/{id}', 'edit')->middleware('can:Users,Dashboard.Users.Edit')->name('Dashboard.Users.Edit');
            Route::put('/Update/{id}', 'update')->middleware('can:Users,Dashboard.Users.Update')->name('Dashboard.Users.Update');
            Route::post('/Show/{id}', 'show')->middleware('can:Users,Dashboard.Users.Show')->name('Dashboard.Users.Show');
            Route::put('/Password/{id}', 'password')->middleware('can:Users,Dashboard.Users.Password')->name('Dashboard.Users.Password');
            Route::delete('/Delete', 'delete')->middleware('can:Users,Dashboard.Users.Delete')->name('Dashboard.Users.Delete');
            Route::put('/Restore', 'restore')->middleware('can:Users,Dashboard.Users.Restore')->name('Dashboard.Users.Restore');
            Route::post('/AssignRoleAndPermissions', 'assignRoleAndPermissions')->middleware('can:Users,Dashboard.Users.AssignRoleAndPermissions')->name('Dashboard.Users.AssignRoleAndPermissions');
            Route::post('/AssignRoleAndPermissions/Query', 'assignRoleAndPermissionsQuery')->middleware('can:Users,Dashboard.Users.AssignRoleAndPermissions.Query')->name('Dashboard.Users.AssignRoleAndPermissions.Query');
            Route::post('/RemoveRoleAndPermissions', 'removeRoleAndPermissions')->middleware('can:Users,Dashboard.Users.RemoveRoleAndPermissions')->name('Dashboard.Users.RemoveRoleAndPermissions');
            Route::post('/RemoveRoleAndPermissions/Query', 'removeRoleAndPermissionsQuery')->middleware('can:Users,Dashboard.Users.RemoveRoleAndPermissions.Query')->name('Dashboard.Users.RemoveRoleAndPermissions.Query');
        });
    });*/

    Route::prefix('/RolesAndPermissions')->group(function () {
        Route::controller(RolesAndPermissionsController::class)->group(function () {
            Route::get('/Index', 'index')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Index')->name('Dashboard.RolesAndPermissions.Index');
            Route::post('/Index/Query', 'indexQuery')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Index.Query')->name('Dashboard.RolesAndPermissions.Index.Query');
            Route::post('/Create', 'create')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Create')->name('Dashboard.RolesAndPermissions.Create');
            Route::post('/Store', 'store')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Store')->name('Dashboard.RolesAndPermissions.Store');
            Route::post('/Edit/{id}', 'edit')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Edit')->name('Dashboard.RolesAndPermissions.Edit');
            Route::put('/Update/{id}', 'update')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Update')->name('Dashboard.RolesAndPermissions.Update');
            Route::delete('/Delete', 'delete')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Delete')->name('Dashboard.RolesAndPermissions.Delete');
        });
    });

    Route::prefix('/ModulesAndSubmodules')->group(function () {
        Route::controller(ModulesAndSubmodulesController::class)->group(function () {
            Route::get('/Index', 'index')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Index')->name('Dashboard.ModulesAndSubmodules.Index');
            Route::post('/Index/Query', 'indexQuery')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Index.Query')->name('Dashboard.ModulesAndSubmodules.Index.Query');
            Route::post('/Create', 'create')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Create')->name('Dashboard.ModulesAndSubmodules.Create');
            Route::post('/Store', 'store')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Store')->name('Dashboard.ModulesAndSubmodules.Store');
            Route::post('/Edit/{id}', 'edit')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Edit')->name('Dashboard.ModulesAndSubmodules.Edit');
            Route::put('/Update/{id}', 'update')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Update')->name('Dashboard.ModulesAndSubmodules.Update');
            Route::delete('/Delete', 'delete')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Delete')->name('Dashboard.ModulesAndSubmodules.Delete');
        });
    });

});




