<?php

namespace App\Http\Livewire;

use App\Models\Section;
use App\Models\Service;
use Livewire\Component;

class ServicesHome extends Component
{
    public function render()
    {
        // $sections = Section::with('services')->get();
        // // return response()->json($sections);
        // $services = Service::all();
        // return view('livewire.services-home', compact('sections', 'services'));
    }
}
