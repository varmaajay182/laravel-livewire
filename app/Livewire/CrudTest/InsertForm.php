<?php

namespace App\Livewire\CrudTest;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class InsertForm extends Component
{
    public $name;
    public $email;
    public $roll_no;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'roll_no' => 'required',
     ];
    

    public function insertData()
    {
        $this->validate();
         
        Student::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'roll_no'=>$this->roll_no
        ]);
        
        session()->flash('success', 'Data saved successfully.');
        return $this->redirect('/list', navigate: true);

    }

    public function render()
    {
        return view('livewire.crud-test.insert-form');
    }
}
