<?php

use App\Http\Controllers\Admin\AdminActivityLogController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminNoteController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminTodoController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\AdminUserNoteController;
use App\Http\Controllers\Admin\Projects\AdminProjectIndexController;
use App\Http\Controllers\Admin\Projects\AdminProjectTaskController;
use App\Http\Controllers\Admin\Settings\AdminSettingsController;
use App\Http\Controllers\Client\ClientIndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Admin Routes
Route::middleware(['auth', 'role:super admin|admin|staff'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('dashboard', [AdminIndexController::class, 'index'])->name('dashboard');

    //Activity Log
    Route::prefix('activity-log')->name('activity-log.')->group(function(){
        Route::get('/', [AdminActivityLogController::class, 'index'])->name('index');
        Route::post('clear', [AdminActivityLogController::class, 'clearLog'])->name('clear');
    });

    //Client Routes
    Route::resource('clients', AdminClientController::class);
    Route::prefix('clients')->name('clients.')->group(function(){

    });

    //Lead Routes
    Route::resource('leads', AdminLeadController::class);

    //Note Routes
    Route::resource('notes', AdminUserNoteController::class);

    //Notifications
    Route::patch('mark-all-notifications-as-read', [AdminNotificationController::class, 'markAllNotificationsAsRead'])->name('mark-all-notifications-as-read');
    Route::patch('mark-notification-as-read/{id}', [AdminNotificationController::class, 'markNotificationAsRead'])->name('mark-notification-as-read');

    //Projects
    Route::prefix('projects')->name('projects.')->group(function(){
        Route::get('/', [AdminProjectIndexController::class, 'index'])->name('index');
        Route::get('create', [AdminProjectIndexController::class, 'create'])->name('create');
        Route::post('store', [AdminprojectIndexController::class, 'store'])->name('store');
        Route::get('/{id}/show', [AdminProjectIndexController::class, 'show'])->name('show');
        Route::prefix('{id}/tasks')->name('tasks.')->group(function(){
            Route::get('/', [AdminProjectTaskController::class, 'index'])->name('index');
            Route::get('/create', [AdminProjectTaskController::class, 'create'])->name('create');
            Route::put('/store', [AdminProjectTaskController::class, 'store'])->name('store');
        });
    });

    //Settings Routes
    Route::prefix('settings')->name('settings.')->group(function(){
       Route::get('/', [AdminSettingsController::class, 'index'])->name('index');
    });

    //Todos
    Route::prefix('todos')->name('todos.')->group(function(){
        Route::get('/', [AdminTodoController::class, 'index'])->name('index');
        Route::get('/create', [AdminTodoController::class, 'create'])->name('create');
        Route::post('/store', [AdminTodoController::class, 'store'])->name('store');
        Route::get('/{id}/show', [AdminTodoController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminTodoController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [AdminTodoController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [AdminTodoController::class, 'destroy'])->name('destroy');
    });

    //Transactions
    Route::prefix('transactions')->name('transactions.')->group(function(){
        Route::get('/', [AdminTransactionController::class, 'index'])->name('index');
        Route::get('create', [AdminTransactionController::class, 'create'])->name('create');
        Route::post('store', [AdminTransactionController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminTransactionController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [AdminTransactionController::class, 'update'])->name('update');
    });
});

//Client Routes
Route::middleware(['auth', 'role:client'])->name('client.')->prefix('client')->group(function(){
    Route::get('dashboard', [ClientIndexController::class, 'index'])->name('dashboard');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
