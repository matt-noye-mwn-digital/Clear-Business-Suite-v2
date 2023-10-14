<?php
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
   $trail->push('Client', route('admin.clients.index'));
});
Breadcrumbs::for('admin-clients-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-clients');
    $trail->push('Add Client', route('admin.clients.create'));
});

//Admin Settings
Breadcrumbs::for('admin-settings', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Settings', route('admin.settings.index'));
});


