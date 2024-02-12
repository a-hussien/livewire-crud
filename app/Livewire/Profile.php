<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;

#[Title("Profile")]
class Profile extends Component
{
    public function render(Request $request)
    {
        return view('livewire.profile')->with([
            'user' => $request->user(),
        ]);
    }
}
