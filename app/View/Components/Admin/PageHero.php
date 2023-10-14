<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHero extends Component
{

    public $title;
    public $buttonContent;
    public $buttonLink;
    public $displayButton;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $displayButton, $buttonContent = null, $buttonLink = null)
    {
        $this->title = $title;
        $this->displayButton = $displayButton;
        $this->buttonContent = $buttonContent;
        $this->buttonLink = $buttonLink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.page-hero');
    }
}
