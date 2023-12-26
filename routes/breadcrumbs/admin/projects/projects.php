<?php

use App\Models\Project;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-projects', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('All Projects', route('admin.projects.index'));
});
Breadcrumbs::for('admin-projects-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-projects');
    $trail->push('Create Project', route('admin.projects.create'));
});
Breadcrumbs::for('admin-projects-show', function(BreadcrumbTrail $trail, Project $project){
    $trail->parent('admin-projects');
    $trail->push('View ' . $project->project_name, route('admin.projects.show', $project->id));
});
