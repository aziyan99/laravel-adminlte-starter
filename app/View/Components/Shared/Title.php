<?php

namespace App\View\Components\shared;

use App\Models\Setting;
use Illuminate\View\Component;

class Title extends Component
{
    public $schoolName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $setting = Setting::first();
        $this->schoolName = $setting->school_name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.title');
    }
}
