<?php

use App\Models\Invoice;
use App\Models\Project;
use App\Models\ProjectMilestone;
use App\Models\ProjectNote;
use App\Models\ProjectTask;
use App\Models\Todo;
use App\Models\User;
use App\Models\UserNote;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Console\View\Components\Task;


Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Home', route('home'));
});
//Admin dashboard
Breadcrumbs::for('admin-dashboard', function(BreadcrumbTrail $trail){
    $trail->push("Admin Dashboard", route('admin.dashboard'));
});
//Admin Clients
include('breadcrumbs/clients.php');

//Admin Expenses
include('breadcrumbs/expenses.php');

//Admin Invoices
include('breadcrumbs/invoices.php');

//Admin Leads
include('breadcrumbs/leads.php');

//Admin Notes
include('breadcrumbs/notes.php');

//Admin Projects
include('breadcrumbs/projects/projects.php');

//Project Tasks
include('breadcrumbs/projects/project-tasks.php');

//Project Milestones
include('breadcrumbs/projects/project-milestones.php');

//Project Notes
include('breadcrumbs/projects/project-notes.php');

//Admin Settings
include('breadcrumbs/settings/settings.php');

//Admin Todos
include('breadcrumbs/admin-todos.php');

//Activity Log
Breadcrumbs::for('admin-activity-log', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Activity Log', route('admin.activity-log.index'));
});
