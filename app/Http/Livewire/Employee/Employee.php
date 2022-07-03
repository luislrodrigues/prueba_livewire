<?php

namespace App\Http\Livewire\Employee;

use App\Models\Company;
use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Employee extends Component
{
    public $first_name, $last_name, $email, $phone, $company_id, $id_selected;
    protected $listeners =['render' => 'render','destroy'];
    
    public function render()
    {
        $employees = ModelsEmployee::orderBy('id','desc')->paginate(10);
        $companies = Company::all();
        return view('livewire.employee.employee',compact('employees','companies'));
    }


    public function store (){
        $this->validate([
            'first_name'   => ['required','string',],
            'last_name'   => ['required','string'],
            'email'  => ['required','email',Rule::unique('employees')->whereNull('deleted_at')],
            'phone' => ['required','numeric','digits_between:7,12',Rule::unique('employees')->whereNull('deleted_at')],
            'company_id'   => ['required','exists:companies,id']
        ]);

        ModelsEmployee::create([
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'email'        => $this->email,
            'phone'        => $this->phone,
            'company_id'   => $this->company_id,
        ]);

        $this->emit('alertSuccess','Empleado creado correctamente');
        $this->emit('render');
        $this->emit('closeModal');
        $this->reset('first_name','last_name','email','phone','company_id');
    }

    public function show(ModelsEmployee $employee){
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
    }

    
    public function edit(ModelsEmployee $employee){
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->company_id = $employee->company_id;
        $this->id_selected = $employee->id;
    }

    public function update(){
        $employee = ModelsEmployee::find($this->id_selected);

        $this->validate([
            'first_name'   => ['required','string',],
            'last_name'    => ['required','string'],
            'email'        => ['required','email',Rule::unique('employees')->ignore($this->id_selected)->whereNull('deleted_at')],
            'phone'        => ['required','numeric','digits_between:7,12',Rule::unique('employees')->ignore($this->id_selected)->whereNull('deleted_at')],
            'company_id'   => ['required','exists:companies,id']
        ]);
        
        $employee->update([
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'company_id'    => $this->company_id,
        ]);
        $this->emit('closeModal');
        $this->emit('render');
        $this->emit('alertSuccess','Empleado actualizado correctamente');
        $this->reset('first_name','last_name','email','phone','company_id','id_selected');
    }

    public function destroy(ModelsEmployee $employee){
        $employee->delete();
        $this->emit('render');
    }

    public function restart(){
        $this->resetValidation();
        $this->reset('first_name','last_name','email','phone','company_id');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
