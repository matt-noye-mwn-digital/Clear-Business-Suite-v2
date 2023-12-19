<?php

use App\Models\Invoice;
use App\Models\Project;
use App\Models\ProjectMilestone;
use App\Models\ProjectNote;
use App\Models\ProjectTask;
use App\Models\Todo;
use App\Models\User;
use App\Models\UserNote;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Console\View\Components\Task;


Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Home', route('home'));
});
//Admin dashboard
Breadcrumbs::for('admin-dashboard', function(BreadcrumbTrail $trail){
    $trail->push("Admin Dashboard", route('admin.dashboard'));
});
//Admin Clients
Breadcrumbs::for('admin-clients', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Clients', route('admin.clients.index'));
});
Breadcrumbs::for('admin-clients-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-clients');
    $trail->push('Add Client', route('admin.clients.create'));
});
Breadcrumbs::for('admin-clients-show', function(BreadcrumbTrail $trail, User $client){
    $trail->parent('admin-clients');
    $trail->push($client->first_name . ' ' . $client->last_name , route('admin.clients.show', $client->id));
});
//Admin Invoices
Breadcrumbs::for('admin-invoices-index', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Invoices', route('admin.invoices.index'));
});
Breadcrumbs::for('admin-invoices-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-invoices-index');
    $trail->push('Create Invoice', route('admin.invoices.create'));
});
Breadcrumbs::for('admin-invoices-edit', function(BreadcrumbTrail $trail, Invoice $invoice){
    $trail->parent('admin-invoices-index');
    $trail->push('Edit Invoice ' . $invoice->invoice_number, route('admin.invoices.edit', $invoice->id));
});
Breadcrumbs::for('admin-invoices-add-payment', function(BreadcrumbTrail $trail, Invoice $invoice){
    $trail->parent('admin-invoices-index');
    $trail->push('Add Payment to Invoice ' . $invoice->invoice_number, route('admin.invoices.add-payment-view', $invoice->id));
});


//Admin Leads
Breadcrumbs::for('admin-leads', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Leads', route('admin.leads.index'));
});
Breadcrumbs::for('admin-leads-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-leads');
    $trail->push('Add Lead', route('admin.leads.create'));
});
//Admin Notes
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
//Admin Projects
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

//Project Tasks
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

//Project Milestones
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

//Project Notes
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

//Admin Settings
Breadcrumbs::for('admin-settings', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Settings', route('admin.settings.index'));
});
Breadcrumbs::for('admin-settings-create', function(BreadcrumbTrail $trail){
    $trail->parent('admin-settings');
    $trail->push('Create Setting', route('admin.settings.create'));
});
//Admin Todos
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

//Activity Log
Breadcrumbs::for('admin-activity-log', function(BreadcrumbTrail $trail){
    $trail->parent('admin-dashboard');
    $trail->push('Activity Log', route('admin.activity-log.index'));
});
