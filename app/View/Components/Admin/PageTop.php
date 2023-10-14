<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageTop extends Component
{
    public $pageTitle;
    public $pageStyles;
    public $pageScripts;
    /**
     * Create a new component instance.
     */
    public function __construct($pageTitle, $pageStyles = NULL, $pageScripts = NULL)
    {
        $this->pageTitle = $pageTitle;
        $this->pageStyles = $pageStyles;
        $this->pageScripts = $pageScripts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.page-top');
    }
}
