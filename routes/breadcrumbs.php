<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Console\View\Components\Task;


Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Home', route('home'));
});
//Admin dashboard
include('breadcrumbs/admin/admin-dashboard.php');

//Admin Clients
include('breadcrumbs/admin/clients.php');

//Admin Expenses
include('breadcrumbs/admin/expenses.php');

//Admin Invoices
include('breadcrumbs/admin/invoices.php');

//Admin Leads
include('breadcrumbs/admin/leads.php');

//Admin Notes
include('breadcrumbs/admin/notes.php');

//Admin Projects
include('breadcrumbs/admin/projects/projects.php');

//Project Tasks
include('breadcrumbs/admin/projects/project-tasks.php');

//Project Milestones
include('breadcrumbs/admin/projects/project-milestones.php');

//Project Notes
include('breadcrumbs/admin/projects/project-notes.php');

//Admin Settings
include('breadcrumbs/admin/settings/settings.php');

//Admin Todos
include('breadcrumbs/admin/admin-todos.php');

//Activity Log
include('breadcrumbs/admin/activity-log.php');
