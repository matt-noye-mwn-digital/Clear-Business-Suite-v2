<?php

use App\Models\Project;
use App\Models\ProjectNote;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-projects-notes-index', function(BreadcrumbTrail $trail, Project $project){
    $trail->parent('admin-projects-show', $project);
    $trail->push('All ' .$project->project_name . ' notes', route('admin.projects.notes.index', $project->id));
});
Breadcrumbs::for('admin-projects-notes-create', function(BreadcrumbTrail $trail, Project $project){
    $trail->parent('admin-projects-notes-index', $project);
    $trail->push('Create Project', route('admin.projects.notes.create', $project->id));
});
Breadcrumbs::for('admin-projects-notes-edit', function(BreadcrumbTrail $trail, Project $project, ProjectNote $projectNote){
    $trail->parent('admin-projects-notes-index', $project);
    $trail->push('Edit ' . $projectNote->title . ' milestone', route('admin.projects.milestones.edit', [$project->id, $projectNote->id]));
});
