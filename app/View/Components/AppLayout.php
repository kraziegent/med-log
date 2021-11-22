<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{

    /**
     * The page breadcrumbs.
     *
     * @var array
     */
    public $breadcrumbs;

    /**
     * Create the component instance.
     *
     * @param  array  $breadcrumbs
     * @return void
     */
    public function __construct($breadcrumbs = null)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
