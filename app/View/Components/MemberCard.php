<?php

namespace App\View\Components;

use App\Models\TeamMember;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MemberCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $divisionName,
        public string $imageUrl,
        public string $qualification,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.member-card');
    }
}
