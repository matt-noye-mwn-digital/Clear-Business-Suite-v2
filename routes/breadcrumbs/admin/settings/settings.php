<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-settings', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Settings', route('admin.settings.index'));
});
Breadcrumbs::for('admin-settings-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-settings');
    $trail->push('Create Setting', route('admin.settings.create'));
});
