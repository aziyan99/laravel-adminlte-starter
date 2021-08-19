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

    public $school_name;
    public $logo;

    public function __construct()
    {
        $setting = Setting::first();
        $this->school_name = $setting->school_name;
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
