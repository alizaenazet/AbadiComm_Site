<?php

namespace App\View\Components\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\Portfolio;


class WelcomePortfolio extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $portfolios = Cache::rememberForever("portfolios", function (){
            return Portfolio::all()->sortByDesc('updated_at');
        });
        return view('components.pages.welcome-portfolio')
        ->with('portfolios',$portfolios->take(4)->all());
    }
}
