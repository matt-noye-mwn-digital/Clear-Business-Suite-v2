<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-activity-log', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Activity Log', route('admin.activity-log.index'));
});
