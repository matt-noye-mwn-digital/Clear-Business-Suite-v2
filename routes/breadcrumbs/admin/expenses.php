<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.expenses-index', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Expenses', route('admin.expenses.index'));
});
