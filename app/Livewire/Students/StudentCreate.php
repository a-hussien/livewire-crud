<?php

namespace App\Livewire\Students;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Create Student')]
class StudentCreate extends Component
{
    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|string|lowercase|email|max:255|unique:students,email,except,id')]
    public $email;

    #[Validate('required|integer', as: 'class')]
    public $class_id;

    #[Validate('required|integer', as: 'section')]
    public $section_id;

    public $sections = [];

    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }

    public function createStudent()
    {
        $this->validate();

        Student::create($this->only([
            'name',
            'email',
            'class_id',
            'section_id',
        ]));

        $this->reset();

        return $this->redirect(route('students.index'));
    }

    public function render()
    {
        return view('livewire.students.student-create')->with([
            'classes' => Classes::with('sections')->get(),
        ]);
    }
}
