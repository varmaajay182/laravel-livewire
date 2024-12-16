<?php

namespace App\Livewire\CrudTest;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Formlisting extends Component
{
    use WithPagination;

    public $data;

    public function mount()
    {
        $this->data = Student::get();
    }

    public function deleteStudent($id)
    {
        
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            session()->flash('success', 'Student deleted successfully.');
        }
    }

    public function render()
    {
        $data = Student::paginate(10);
        return view('livewire.crud-test.formlisting',[
            'students' => $data
        ]);
    }
}
