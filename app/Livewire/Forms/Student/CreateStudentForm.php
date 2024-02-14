<?php

namespace App\Livewire\Forms\Student;

use Livewire\Form;
use App\Models\Section;
use App\Models\Student;
use Livewire\Attributes\Validate;

class CreateStudentForm extends Form
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

    public function store()
    {
        $this->validate();

        Student::create($this->only([
            'name',
            'email',
            'class_id',
            'section_id',
        ]));
    }

}
