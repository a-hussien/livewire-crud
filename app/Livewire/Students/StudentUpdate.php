<?php

namespace App\Livewire\Students;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\Student\UpdateStudentForm;

#[Title('Edit Student')]
class StudentUpdate extends Component
{
    public ?Student $student;

    public UpdateStudentForm $form;

    public function updatedFormClassId($value)
    {
        $this->form->updatedClassId($value);
    }

    public function editStudent()
    {
        $this->form->updateStudent($this->student);

        // Dispatch browser event (toast)
        $this->dispatch('toast', toast("success", "Student updated successfully."));

        $this->redirectRoute('students.index', navigate: true);
    }

    public function mount($student)
    {
        $this->form->name = $student->name;
        $this->form->email = $student->email;
        $this->form->class_id = $student->class_id;
        $this->form->section_id = $student->section_id;

        $this->form->sections = Section::where('class_id', $student->class_id)->get();
    }

    public function render()
    {
        return view('livewire.students.student-update', [
            'classes' => Classes::with('sections')->get(),
        ]);
    }
}
