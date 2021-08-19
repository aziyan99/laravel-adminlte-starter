<?php

namespace App\View\Components\Frontend\Shareds;

use App\Models\Article;
use App\Models\Setting;
use Illuminate\View\Component;

class footer extends Component
{
    public $setting;
    public $latestArticles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $setting = Setting::first();
        $this->latestArticles = Article::latest()->limit(5)->get();
        $this->setting = $setting;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.shareds.footer');
    }
}
