<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $ids;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;

    public function resetInputFields(){
       $this->firstName = '';
       $this->lastName = '';
       $this->email = '';
       $this->phone = '';
    }
    public function store(){
        $validatedData = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        Student::create( $validatedData);
        session()->flash('message','Student Created Successfully');
        $this->resetInputFields();
        $this->emit('studentAdded');
    }

    public function edit($id){
        $student = Student::where('id',$id)->first();
        $this->ids = $student->id;
        $this->firstName = $student->firstName;
        $this->lastName = $student->lastName;
        $this->email = $student->email;
        $this->phone = $student->phone;

    }
    public function update(){
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        if($this->ids){
            $student = Student::find($this->ids);
            $student->update([
                'firstName'=>$this->firstName,
                'lastName'=>$this->lastName,
                'email'=>$this->email,
                'phone'=>$this->phone
            ]);
            session()->flash('message','Student Updated Successfully');
            $this->resetInputFields();
            $this->emit('studentUpdated');
        }
    }
    public function delete($id){
        if($id){
            Student::where('id',$id)->delete();
            session()->flash('message','Student Deleted Successfully');
        }

    }


    public function render()
    {
        $students = Student::orderBy('id','DESC')->get();
        return view('livewire.students',['students'=>$students]);
    }
}
