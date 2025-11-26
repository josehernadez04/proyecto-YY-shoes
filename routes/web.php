<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModulesAndSubmodulesController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RolesAndPermissionsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesDetailsController;
use App\Http\Controllers\ShoppingsController;
use App\Http\Controllers\ShoppingsDetailsController;
use App\Http\Controllers\TypePersonController;
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
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        });

        Route::prefix('/Users')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/Index', 'index')->name('Users.Index')->middleware('can:Users,Dashboard.Users.Index');
                Route::get('/Create', 'create')->name('Users.Create')->middleware('can:Users,Dashboard.Users.Store');
                Route::post('/Store', 'store')->name('Users.Store')->middleware('can:Users,Dashboard.Users.Store');
                Route::get('/Edit/{id}', 'edit')->name('Users.Edit')->middleware('can:Users,Dashboard.Users.Update');
                Route::put('/Update/{id}', 'update')->name('Users.Update')->middleware('can:Users,Dashboard.Users.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Users.Delete')->middleware('can:Users,Dashboard.Users.Delete');
            });
        });

        Route::prefix('/Categories')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/Index', 'index')->name('Categories.Index')->middleware('can:Users,Dashboard.Categories.Index');
                Route::get('/Create', 'create')->name('Categories.Create')->middleware('can:Users,Dashboard.Categories.Store');
                Route::post('/Store', 'store')->name('Categories.Store')->middleware('can:Users,Dashboard.Categories.Store');
                Route::get('/Edit/{id}', 'edit')->name('Categories.Edit')->middleware('can:Users,Dashboard.Categories.Update');
                Route::put('/Update/{id}', 'update')->name('Categories.Update')->middleware('can:Users,Dashboard.Categories.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Categories.Delete')->middleware('can:Users,Dashboard.Categories.Delete');
            });
        });

        Route::prefix('/TypeDocuments')->group(function () {
            Route::controller(TypeDocumentController::class)->group(function () {
                Route::get('/Index', 'index')->name('TypeDocuments.Index')->middleware('can:Users,Dashboard.TypeDocuments.Index');
                Route::get('/Create', 'create')->name('TypeDocuments.Create')->middleware('can:Users,Dashboard.TypeDocuments.Store');
                Route::post('/Store', 'store')->name('TypeDocuments.Store')->middleware('can:Users,Dashboard.TypeDocuments.Store');
                Route::get('/Edit/{id}', 'edit')->name('TypeDocuments.Edit')->middleware('can:Users,Dashboard.TypeDocuments.Update');
                Route::put('/Update/{id}', 'update')->name('TypeDocuments.Update')->middleware('can:Users,Dashboard.TypeDocuments.Update');
                Route::delete('/Delete/{id}', 'delete')->name('TypeDocuments.Delete')->middleware('can:Users,Dashboard.TypeDocuments.Delete');
            });
        });

        Route::prefix('/Clients')->group(function () {
            Route::controller(ClientController::class)->group(function () {
                Route::get('/Index', 'index')->name('Clients.Index')->middleware('can:Clients,Dashboard.Clients.Index');
                Route::get('/Create', 'create')->name('Clients.Create')->middleware('can:Clients,Dashboard.Clients.Store');
                Route::post('/Store', 'store')->name('Clients.Store')->middleware('can:Clients,Dashboard.Clients.Store');
                Route::get('/Edit/{id}', 'edit')->name('Clients.Edit')->middleware('can:Clients,Dashboard.Clients.Update');
                Route::put('/Update/{id}', 'update')->name('Clients.Update')->middleware('can:Clients,Dashboard.Clients.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Clients.Delete')->middleware('can:Clients,Dashboard.Clients.Delete');
            });
        });

        Route::prefix('/Providers')->group(function () {
            Route::controller(ProviderController::class)->group(function () {
                Route::get('/Index', 'index')->name('Providers.Index')->middleware('can:Providers,Dashboard.Providers.Index');
                Route::get('/Create', 'create')->name('Providers.Create')->middleware('can:Providers,Dashboard.Providers.Store');
                Route::post('/Store', 'store')->name('Providers.Store')->middleware('can:Providers,Dashboard.Providers.Store');
                Route::get('/Edit/{id}', 'edit')->name('Providers.Edit')->middleware('can:Providers,Dashboard.Providers.Update');
                Route::put('/Update/{id}', 'update')->name('Providers.Update')->middleware('can:Providers,Dashboard.Providers.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Providers.Delete')->middleware('can:Providers,Dashboard.Providers.Delete');
            });
        });

        Route::prefix('/Products')->group(function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('/Index', 'index')->name('Products.Index')->middleware('can:Products,Dashboard.Products.Index');
                Route::get('/Create', 'create')->name('Products.Create')->middleware('can:Products,Dashboard.Products.Store');
                Route::post('/Store', 'store')->name('Products.Store')->middleware('can:Products,Dashboard.Products.Store');
                Route::get('/Edit/{id}', 'edit')->name('Products.Edit')->middleware('can:Products,Dashboard.Products.Update');
                Route::put('/Update/{id}', 'update')->name('Products.Update')->middleware('can:Products,Dashboard.Products.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Products.Delete')->middleware('can:Products,Dashboard.Products.Delete');
            });
        });

        Route::prefix('/Sales')->group(function () {
            Route::controller(SalesController::class)->group(function () {
                Route::get('/Index', 'index')->name('Sales.Index')->middleware('can:Sales,Dashboard.Sales.Index');
                Route::get('/Create', 'create')->name('Sales.Create')->middleware('can:Sales,Dashboard.Sales.Store');
                Route::post('/Store', 'store')->name('Sales.Store')->middleware('can:Sales,Dashboard.Sales.Store');
                Route::get('/Show/{id}', 'show')->name('Sales.Show')->middleware('can:Sales,Dashboard.Sales.Show');
                Route::get('/Edit/{id}', 'edit')->name('Sales.Edit')->middleware('can:Sales,Dashboard.Sales.Update');
                Route::put('/Update/{id}', 'update')->name('Sales.Update')->middleware('can:Sales,Dashboard.Sales.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Sales.Delete')->middleware('can:Sales,Dashboard.Sales.Delete');
            });

            Route::controller(SalesDetailsController::class)->group(function () {
                Route::get('/Details/Create', 'create')->name('Sales.Details.Create')->middleware('can:Sales,Dashboard.Sales.Details.Store');
                Route::post('/Details/Store', 'store')->name('Sales.Details.Store')->middleware('can:Sales,Dashboard.Sales.Details.Store');
            });
        });

        Route::prefix('/Shoppings')->group(function () {
            Route::controller(ShoppingsController::class)->group(function () {
                Route::get('/Index', 'index')->name('Shoppings.Index')->middleware('can:Shoppings,Dashboard.Shoppings.Index');
                Route::get('/Create', 'create')->name('Shoppings.Create')->middleware('can:Shoppings,Dashboard.Shoppings.Store');
                Route::post('/Store', 'store')->name('Shoppings.Store')->middleware('can:Shoppings,Dashboard.Shoppings.Store');
                Route::get('/Show/{id}', 'show')->name('Shoppings.Show')->middleware('can:Shoppings,Dashboard.Shoppings.Show');
                Route::get('/Edit/{id}', 'edit')->name('Shoppings.Edit')->middleware('can:Shoppings,Dashboard.Shoppings.Update');
                Route::put('/Update/{id}', 'update')->name('Shoppings.Update')->middleware('can:Shoppings,Dashboard.Shoppings.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Shoppings.Delete')->middleware('can:Shoppings,Dashboard.Shoppings.Delete');
            });

            Route::controller(ShoppingsDetailsController::class)->group(function () {
                Route::get('/Details/Create', 'create')->name('Shoppings.Details.Create')->middleware('can:Shoppings,Dashboard.Shoppings.Details.Store');
                Route::post('/Details/Store', 'store')->name('Shoppings.Details.Store')->middleware('can:Shoppings,Dashboard.Shoppings.Details.Store');
            });
        });

        Route::prefix('/Profile')->group(function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/Index', 'index')->name('Profile.Index');
                Route::put('/updateImage', 'updateimage')->name('Profile.UpdateImage');
            });
        });

        Route::prefix('/RolesAndPermissions')->group(function () {
            Route::controller(RolesAndPermissionsController::class)->group(function () {
                Route::get('/Index', 'index')->name('Dashboard.RolesAndPermissions.Index')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Index');
                Route::post('/Index/Query', 'indexQuery')->name('Dashboard.RolesAndPermissions.Index.Query')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Index.Query');
                Route::post('/Create', 'create')->name('Dashboard.RolesAndPermissions.Create')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Create');
                Route::post('/Store', 'store')->name('Dashboard.RolesAndPermissions.Store')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Store');
                Route::post('/Edit/{id}', 'edit')->name('Dashboard.RolesAndPermissions.Edit')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Edit');
                Route::put('/Update/{id}', 'update')->name('Dashboard.RolesAndPermissions.Update')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Update');
                Route::delete('/Delete/{id}', 'delete')->name('Dashboard.RolesAndPermissions.Delete')->middleware('can:RolesAndPermissions,Dashboard.RolesAndPermissions.Delete');
            });
        });

        Route::prefix('TypePersons')->group(function () {
            Route::controller(TypePersonController::class)->group(function () {
                Route::get('/Index', 'index')->name('Dashboard.TypePersons.Index')->middleware('can:TypePersons,Dashboard.TypePersons.Index');
                Route::post('/Index/Query', 'indexQuery')->middleware('can:TypePersons,Dashboard.TypePersons.Index.Query')->name('Dashboard.TypePersons.Index.Query');
                Route::post('/Create', 'create')->middleware('can:TypePersons,Dashboard.TypePersons.Create')->name('Dashboard.TypePersons.Create');
                Route::post('/Store', 'store')->middleware('can:TypePersons,Dashboard.TypePersons.Store')->name('Dashboard.TypePersons.Store');
                Route::post('/Edit/{id}', 'edit')->middleware('can:TypePersons,Dashboard.TypePersons.Edit')->name('Dashboard.TypePersons.Edit');
                Route::put('/Update/{id}', 'update')->middleware('can:TypePersons,Dashboard.TypePersons.Update')->name('Dashboard.TypePersons.Update');
                Route::delete('/Delete/{id}', 'delete')->middleware('can:TypePersons,Dashboard.TypePersons.Delete')->name('Dashboard.TypePersons.Delete');
            });
        });
    });



    /*Route::prefix('/Users')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/Index', 'index')->middleware('can:Users,Dashboard.Dashboard.Users.Index')->name('Dashboard.Users.Index');
            Route::post('/Index/Query', 'indexQuery')->middleware('can:Users,Dashboard.Dashboard.Users.Index.Query')->name('Dashboard.Users.Index.Query');
            Route::post('/Create', 'create')->middleware('can:Users,Dashboard.Dashboard.Users.Create')->name('Dashboard.Users.Create');
            Route::post('/Store', 'store')->middleware('can:Users,Dashboard.Dashboard.Users.Store')->name('Dashboard.Users.Store');
            Route::post('/Edit/{id}', 'edit')->middleware('can:Users,Dashboard.Dashboard.Users.Edit')->name('Dashboard.Users.Edit');
            Route::put('/Update/{id}', 'update')->middleware('can:Users,Dashboard.Dashboard.Users.Update')->name('Dashboard.Users.Update');
            Route::post('/Show/{id}', 'show')->middleware('can:Users,Dashboard.Dashboard.Users.Show')->name('Dashboard.Users.Show');
            Route::put('/Password/{id}', 'password')->middleware('can:Users,Dashboard.Dashboard.Users.Password')->name('Dashboard.Users.Password');
            Route::delete('/Delete/{id}', 'delete')->middleware('can:Users,Dashboard.Dashboard.Users.Delete')->name('Dashboard.Users.Delete');
            Route::put('/Restore', 'restore')->middleware('can:Users,Dashboard.Dashboard.Users.Restore')->name('Dashboard.Users.Restore');
            Route::post('/AssignRoleAndPermissions', 'assignRoleAndPermissions')->middleware('can:Users,Dashboard.Dashboard.Users.AssignRoleAndPermissions')->name('Dashboard.Users.AssignRoleAndPermissions');
            Route::post('/AssignRoleAndPermissions/Query', 'assignRoleAndPermissionsQuery')->middleware('can:Users,Dashboard.Dashboard.Users.AssignRoleAndPermissions.Query')->name('Dashboard.Users.AssignRoleAndPermissions.Query');
            Route::post('/RemoveRoleAndPermissions', 'removeRoleAndPermissions')->middleware('can:Users,Dashboard.Dashboard.Users.RemoveRoleAndPermissions')->name('Dashboard.Users.RemoveRoleAndPermissions');
            Route::post('/RemoveRoleAndPermissions/Query', 'removeRoleAndPermissionsQuery')->middleware('can:Users,Dashboard.Dashboard.Users.RemoveRoleAndPermissions.Query')->name('Dashboard.Users.RemoveRoleAndPermissions.Query');
        });
    });*/



    Route::prefix('/ModulesAndSubmodules')->group(function () {
        Route::controller(ModulesAndSubmodulesController::class)->group(function () {
            Route::get('/Index', 'index')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Index')->name('Dashboard.ModulesAndSubmodules.Index');
            Route::post('/Index/Query', 'indexQuery')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Index.Query')->name('Dashboard.ModulesAndSubmodules.Index.Query');
            Route::post('/Create', 'create')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Create')->name('Dashboard.ModulesAndSubmodules.Create');
            Route::post('/Store', 'store')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Store')->name('Dashboard.ModulesAndSubmodules.Store');
            Route::post('/Edit/{id}', 'edit')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Edit')->name('Dashboard.ModulesAndSubmodules.Edit');
            Route::put('/Update/{id}', 'update')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Update')->name('Dashboard.ModulesAndSubmodules.Update');
            Route::delete('/Delete/{id}', 'delete')->middleware('can:ModulesAndSubmodules,Dashboard.ModulesAndSubmodules.Delete')->name('Dashboard.ModulesAndSubmodules.Delete');
        });
    });
});
