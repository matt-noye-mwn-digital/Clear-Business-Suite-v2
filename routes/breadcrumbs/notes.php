<?php

use App\Models\UserNote;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-notes', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Notes', route('admin.notes.index'));
});
Breadcrumbs::for('admin-notes-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-notes');
    $trail->push('Add Note', route('admin.notes.create'));
});
Breadcrumbs::for('admin-notes-show', function(BreadcrumbTrail $trail, UserNote $note){
    $trail->parent('admin-notes');
    $trail->push($note->title . ' Note', route('admin.notes.show', $note->id));
});
Breadcrumbs::for('admin-notes-edit', function(BreadcrumbTrail $trail, UserNote $note){
    $trail->parent('admin-notes');
    $trail->push('edit ' . $note->title, route('admin.notes.edit', $note->id));
});
