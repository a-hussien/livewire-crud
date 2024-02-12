<?php

namespace App\Livewire\Students;

use Livewire\Component;
use Livewire\Attributes\Title;

class StudentList extends Component
{
    #[Title('Students')]
    public function render()
    {
        return view('livewire.students.index');
    }
}
