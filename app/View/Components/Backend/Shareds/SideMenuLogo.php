<?php

namespace App\View\Components\Backend\Shareds;

use App\Models\Setting;
use Illuminate\View\Component;

class SideMenuLogo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name;
    public $logo;

    public function __construct()
    {
        $setting = Setting::first();
        $this->name = $setting->name;
        $this->logo = $setting->logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.shareds.side-menu-logo');
    }
}
