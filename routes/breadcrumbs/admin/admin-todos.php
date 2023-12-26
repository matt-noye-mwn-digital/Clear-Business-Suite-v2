<?php

use App\Models\Todo;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

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
