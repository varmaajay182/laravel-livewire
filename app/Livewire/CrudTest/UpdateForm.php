<?php

namespace App\Livewire\CrudTest;

use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class UpdateForm extends Component
{

    public $id;
    public $student;
    public $name;
    public $email;
    public $roll_no;

    public function mount($id)
    {
        $this->student = Student::find($id);
        $this->name = $this->student->name;
        $this->email = $this->student->email;
        $this->roll_no = $this->student->roll_no;
    }

    public function updateData()
    {
        $student = $this->student;

        if (!$student) {
            session()->flash('error', 'student not found');
            return $this->redirect('/list', navigate: true);
        }

        $student->update([
            'name' => $this->name,
            'email' => $this->email,
            'roll_no' => $this->roll_no,
        ]);

        session()->flash('success', 'data updated sucessfully');

        return $this->redirect('/list', navigate: true);

    }

    public function render()
    {
        return view('livewire.crud-test.update-form');
    }
}
