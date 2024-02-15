<?php

namespace App\Livewire\Students;

use App\Models\Classes;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\Student\CreateStudentForm;

#[Title('Create Student')]
class StudentCreate extends Component
{
    public CreateStudentForm $form;

    // updated form class_id
    public function updatedFormClassId($value)
    {
        $this->form->updatedClassId($value);
    }

    public function createStudent()
    {
        $this->form->store();

        // Dispatch browser event (toast)
        $this->dispatch('toast', toast("success", "Student created successfully."));

        $this->redirectRoute('students.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.students.student-create')->with([
            'classes' => Classes::with('sections')->get(),
        ]);
    }
}
