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
use App\Http\Controllers\Admin\Projects\AdminProjectMilestoneController;
use App\Http\Controllers\Admin\Projects\AdminProjectNoteController;
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
            Route::put('/store/{taskId}', [AdminProjectTaskController::class, 'store'])->name('store');
            Route::get('/show/{taskId}', [AdminProjectTaskController::class, 'show'])->name('show');
            Route::get('/edit/{taskId}', [AdminProjectTaskController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminProjectTaskController::class, 'update'])->name('update/{taskId}');
            Route::delete('/destroy/{taskId}', [AdminProjectTaskController::class, 'destroy'])->name('destroy');

            Route::put('/setPriorityToLow/{taskId}', [AdminProjectTaskController::class, 'setPriorityToLow'])->name('set-low-priority');
            Route::put('/setPriorityToMedium/{taskId}', [AdminProjectTaskController::class, 'setPriorityToMedium'])->name('set-medium-priority');
            Route::put('/setPriorityToHigh/{taskId}', [AdminProjectTaskController::class, 'setPriorityToHigh'])->name('set-high-priority');
            Route::put('/setPriorityToUrgent/{taskId}', [AdminProjectTaskController::class, 'setPriorityToUrgent'])->name('set-urgent-priority');

            Route::put('/setStatusToNotStarted/{taskId}', [AdminProjectTaskController::class, 'setStatusToNotStarted'])->name('set-to-not-started-status');
            Route::put('/setStatusToInProgress/{taskId}', [AdminProjectTaskController::class, 'setStatusToInProgress'])->name('set-to-in-progress-status');
            Route::put('/setStatusToTesting/{taskId}', [AdminProjectTaskController::class, 'setStatusToTesting'])->name('set-to-testing-status');
            Route::put('/setStatusToAwaitingFeedback/{taskId}', [AdminProjectTaskController::class, 'setStatusToAwaitingFeedback'])->name('set-to-awaiting-feedback-status');
            Route::put('/setStatusToComplete/{taskId}', [AdminProjectTaskController::class, 'setStatusToComplete'])->name('set-to-complete-status');
        });
        Route::prefix('{id}/milestones')->name('milestones.')->group(function(){
           Route::get('/', [AdminProjectMilestoneController::class, 'index'])->name('index');
           Route::get('/create', [AdminProjectMilestoneController::class, 'create'])->name('create');
           Route::put('/store', [AdminProjectMilestoneController::class, 'store'])->name('store');
           Route::get('/show/{milestoneId}', [AdminprojectMilestoneController::class, 'show'])->name('show');
           Route::get('/edit/{milestoneId}', [AdminProjectMilestoneController::class, 'edit'])->name('edit');
           Route::put('/update/{milestoneId}', [AdminprojectMilestoneController::class, 'update'])->name('update');
           Route::delete('/destroy/{milestoneId}', [AdminProjectMilestoneController::class, 'destroy'])->name('destroy');

           Route::put('/setPriorityToLow/{milestoneId}', [AdminProjectMilestoneController::class, 'setPriorityToLow'])->name('set-low-priority');
            Route::put('/setPriorityToMedium/{milestoneId}', [AdminProjectMilestoneController::class, 'setPriorityToMedium'])->name('set-medium-priority');
            Route::put('/setPriorityToHigh/{milestoneId}', [AdminProjectMilestoneController::class, 'setPriorityToHigh'])->name('set-high-priority');
            Route::put('/setPriorityToUrgent/{milestoneId}', [AdminProjectMilestoneController::class, 'setPriorityToUrgent'])->name('set-urgent-priority');

           Route::put('/setStatusToNotStarted/{milestoneId}', [AdminProjectMilestoneController::class, 'setStatusToNotStarted'])->name('set-to-not-started-status');
            Route::put('/setStatusToInProgress/{milestoneId}', [AdminProjectMilestoneController::class, 'setStatusToInProgress'])->name('set-to-in-progress-status');
            Route::put('/setStatusToTesting/{milestoneId}', [AdminProjectMilestoneController::class, 'setStatusToTesting'])->name('set-to-testing-status');
            Route::put('/setStatusToAwaitingFeedback/{milestoneId}', [AdminProjectMilestoneController::class, 'setStatusToAwaitingFeedback'])->name('set-to-awaiting-feedback-status');
            Route::put('/setStatusToComplete/{milestoneId}', [AdminProjectMilestoneController::class, 'setStatusToComplete'])->name('set-to-complete-status');
        });
        Route::prefix('{id}/notes')->name('notes.')->group(function(){
            Route::get('/', [AdminProjectNoteController::class, 'index'])->name('index');

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
Route::middleware(['auth', 'role:client', 'customer.access'])->name('client.')->prefix('client')->group(function(){
    Route::get('dashboard', [ClientIndexController::class, 'index'])->name('dashboard');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
