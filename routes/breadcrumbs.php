<?php

use App\Models\Todo;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Home', route('home'));
});
//Admin dashboard
Breadcrumbs::for('admin-dashboard', function(BreadcrumbTrail $trail){
    $trail->push("Admin Dashboard", route('admin.dashboard'));
});
//Admin Clients
Breadcrumbs::for('admin-clients', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Clients', route('admin.clients.index'));
});
Breadcrumbs::for('admin-clients-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-clients');
    $trail->push('Add Client', route('admin.clients.create'));
});
Breadcrumbs::for('admin-clients-show', function(BreadcrumbTrail $trail, User $client){
    $trail->parent('admin-clients');
    $trail->push($client->first_name . ' ' . $client->last_name , route('admin.clients.show', $client->id));
});
//Admin Leads
Breadcrumbs::for('admin-leads', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Leads', route('admin.leads.index'));
});
Breadcrumbs::for('admin-leads-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-leads');
    $trail->push('Add Lead', route('admin.leads.create'));
});

//Admin Settings
Breadcrumbs::for('admin-settings', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Settings', route('admin.settings.index'));
});
Breadcrumbs::for('admin-settings-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-settings');
    $trail->push('Create Setting', route('admin.settings.create'));
});
//Admin Todos
Breadcrumbs::for('admin-todos', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('All Todos', route('admin.todos.index'));
});
Breadcrumbs::for('admin-todos-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-todos');
    $trail->push('Create Todo', route('admin.todos.create'));
});
Breadcrumbs::for('admin-todos-edit', function(BreadcrumbTrail $trail, Todo $todo){
    $trail->parent('admin-todos');
    $trail->push('edit ' . $todo->title . ' Todo', route('admin.todos.edit', $todo->id));
});
Breadcrumbs::for('admin-todos-show', function(BreadcrumbTrail $trail, Todo $todo){
    $trail->parent('admin-todos');
    $trail->push($todo->title , route('admin.todos.show', $todo->id));
});

//Activity Log
Breadcrumbs::for('admin-activity-log', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Activity Log', route('admin.activity-log.index'));
});
