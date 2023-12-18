<?php

namespace App\View\Components\admin;

use App\Models\Invoice;
use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Calendar extends Component
{
    public $events = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $projects = Project::all();
        $invoices = Invoice::all();

        foreach($projects as $project){
            $this->events[] = [
                'title' => $project->project_name,
                'start' => $project->start_date,
                'url' => route('admin.projects.show', $project->id),
                'color' => '#60a3d9'
            ];
        }
        foreach($invoices as $invoice){
            $this->events[] = [
                'title' => 'Invoice: ' . $invoice->invoice_number,
                'start' => $invoice->due_date,
                'url' => route('admin.invoices.show', $invoice->id),
                'color' => '#0074b7'
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.calendar', ['events' => $this->events]);
    }
}
