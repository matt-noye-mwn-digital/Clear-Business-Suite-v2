<?php

use App\Models\Project;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin-projects-milestones-index', function(BreadcrumbTrail $trail, Project $project){
    $trail->parent('admin-projects-show', $project);
    $trail->push('All ' .$project->project_name . ' milestones', route('admin.projects.milestones.index', $project->id));
});
Breadcrumbs::for('admin-projects-milestones-create', function(BreadcrumbTrail $trail, Project $project){
    $trail->parent('admin-projects-milestones-index', $project);
    $trail->push('Create Milestone', route('admin.projects.milestones.create', $project->id));
});
Breadcrumbs::for('admin-projects-milestones-show', function(BreadcrumbTrail $trail, Project $project, ProjectMilestone $projectMilestone){
    $trail->parent('admin-projects-milestones-index', $project);
    $trail->push('View ' . $projectMilestone->name . ' milestone', route('admin.projects.milestones.show', [$project->id, $projectMilestone->id]));
});
Breadcrumbs::for('admin-projects-milestones-edit', function(BreadcrumbTrail $trail, Project $project, ProjectMilestone $projectMilestone){
    $trail->parent('admin-projects-milestones-index', $project);
    $trail->push('Edit ' . $projectMilestone->name . ' milestone', route('admin.projects.milestones.edit', [$project->id, $projectMilestone->id]));
});
