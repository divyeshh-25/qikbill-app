<?php

namespace App\View\Components\Layout\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public $icon;
    public $label;
    public $link;
    public $isActive;
    
    /**
     * Create a new component instance.
     */
    public function __construct($icon, $label, $link, $isActive = false)
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->link = $link;
        $this->isActive = request()->url() === url($link);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar.item');
    }
}
