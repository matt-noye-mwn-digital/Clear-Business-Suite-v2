<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

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
