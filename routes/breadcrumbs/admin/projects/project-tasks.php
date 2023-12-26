<?php


use App\Models\Project;
use App\Models\ProjectTask;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-projects-tasks-index', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('admin-projects-show', $project);
    $trail->push('All ' . $project->project_name . ' tasks', route('admin.projects.tasks.index', $project->id));
});
Breadcrumbs::for('admin-projects-tasks-create', function(BreadcrumbTrail $trail, Project $project){
    $trail->parent('admin-projects-show', $project);
    $trail->push('Create Task', route('admin.projects.tasks.create', $project->id));
});
Breadcrumbs::for('admin-projects-tasks-show', function(BreadcrumbTrail $trail, Project $project, ProjectTask $projectTask){
    $trail->parent('admin-projects-show', $project);
    $trail->push('View ' . $projectTask->title . ' task', route('admin.projects.tasks.show', [$project->id, $projectTask->id]));
});
Breadcrumbs::for('admin-projects-tasks-edit', function(BreadcrumbTrail $trail, Project $project, ProjectTask $projectTask){
    $trail->parent('admin-projects-show', $project);
    $trail->push('edit ' . $projectTask->title, route('admin.projects.tasks.update', [$project->id, $projectTask->id]));
});
