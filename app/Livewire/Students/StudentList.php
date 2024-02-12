<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\WithoutUrlPagination;

#[Title('Students')]
class StudentList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        return view('livewire.students.index')->with([
            'students' => Student::with(['class', 'section'])
                ->paginate(10),
        ]);
    }
}
