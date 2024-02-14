<?php

namespace App\Livewire\Forms\Student;

use Livewire\Form;
use App\Models\Section;
use Livewire\Attributes\Validate;

class UpdateStudentForm extends Form
{

    #[Validate('required|string|min:3')]
    public $name;

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

    public function updateStudent($student)
    {
        $this->validate([
            'email' =>
            'required|string|lowercase|email|max:255|unique:students,email,' . $student->id,
        ]);

        $student->update($this->only([
            'name',
            'email',
            'class_id',
            'section_id',
        ]));
    }

}
