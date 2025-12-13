<?php

namespace App\View\Components\Layout\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
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
        $this->isActive = $this->detectActiveFromUrl($link);


    }

    protected function detectActiveFromUrl(?string $href): bool
    {
        if (empty($href)) {
            return false;
        }

        $hrefPath = parse_url($href, PHP_URL_PATH) ?? '';

        $hrefPathTrim = trim($hrefPath, '/');

        $requestPath = trim(request()->path(), '/');

        if ($hrefPathTrim === '') {
            return $requestPath === '' || $requestPath === '/';
        }

        return $requestPath === $hrefPathTrim
            || Str::startsWith($requestPath, $hrefPathTrim . '/');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar.item');
    }
}
