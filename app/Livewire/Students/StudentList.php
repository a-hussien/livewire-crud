<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\WithoutUrlPagination;

#[Title('Students')]
class StudentList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $perPage = 10;

    #[Validate('string|max:100')]
    public $search = '';

    public $sortBy = 'created_at';

    public $sortDirection = 'DESC';

    public function sortedBy($field)
    {
        $this->sortDirection == 'DESC' ?
            $this->sortDirection = 'ASC' : $this->sortDirection = 'DESC';

        return $this->sortBy = $field;
    }

    private function setHeaders()
    {
        $headers = collect([
            'id' => '#',
            'name' => 'Name',
            'email' => 'Email',
            'class_id' => 'Class',
            'section_id' => 'Section',
            '' => 'Actions',
        ]);

        return $headers;
    }

    // livewire lifecycle hook for any updated feild
    public function updated()
    {
        $this->validateOnly('search');
        $this->resetPage();
    }

    public function deleteStudent(Student $student)
    {
        $student->delete();

        $this->redirectRoute('students.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.students.index', [
            'headers' => $this->setHeaders(),
            'students' => Student::with(['class', 'section'])
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}
