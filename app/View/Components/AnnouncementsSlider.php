<?php

namespace App\View\Components;

use App\Models\Announcement;
use Illuminate\View\Component;

class AnnouncementsSlider extends Component
{
    public $announcements;

    public function __construct()
    {
        $this->announcements = Announcement::active()
            ->ordered()
            ->get();
    }

    public function render()
    {
        return view('components.announcements-slider');
    }
}