<?php

namespace App\View\Components\Frontend\Shareds;

use App\Models\Setting;
use Illuminate\View\Component;

class header extends Component
{
    public $schoolName;
    public $logo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $setting = Setting::first();
        $this->schoolName = $setting->school_name;
        $this->logo = $setting->logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.shareds.header');
    }
}
