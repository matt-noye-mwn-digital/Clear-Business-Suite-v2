<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-leads', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Leads', route('admin.leads.index'));
});
Breadcrumbs::for('admin-leads-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-leads');
    $trail->push('Add Lead', route('admin.leads.create'));
});
