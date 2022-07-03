<?php

namespace App\Http\Livewire\Company;

use App\Models\Company as ModelsCompany;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Company extends Component
{
    use WithPagination,WithFileUploads;

    public $search, $name, $email, $pagina, $logo, $image, $id_selected;
    protected $paginationTheme = 'bootstrap';
    protected $listeners =['render' => 'render','destroy'];

    public function render()
    {
        $companies = ModelsCompany::where('name','like','%' . $this->search . '%')->orderBy('id','desc')->paginate(10);
        return view('livewire.company.company',compact('companies'));
    }

  
    public function store (){
        $this->validate([
            'name'   => ['required','string'],
            'email'  => ['required','email',Rule::unique('companies')->whereNull('deleted_at')],
            'pagina' => ['required','url',Rule::unique('companies')->whereNull('deleted_at')],
            'logo'   => ['required','image','dimensions:min_width=100,min_height=100']
        ]);
        $logoUrl = Storage::url($this->logo->store('public/images'));

        ModelsCompany::create([
            'name'   => $this->name,
            'email'  => $this->email,
            'pagina' => $this->pagina,
            'logo'   => $logoUrl
        ]);
        $this->reset('name','email','pagina','logo');
        $this->emit('render');
        $this->emit('closeModal');
        $this->emit('alertSuccess','La compañia se creo correctamente');

    }


    public function show(ModelsCompany $company){
        $this->name = $company->name;
        $this->email = $company->email;
        $this->pagina = $company->pagina;
        $this->id_selected = $company->id;
        $this->image = $company->logo;
    }

    public function edit(ModelsCompany $company){
        $this->name = $company->name;
        $this->email = $company->email;
        $this->pagina = $company->pagina;
        $this->id_selected = $company->id;
        $this->image = $company->logo;
    }

    public function update(){

        $company = ModelsCompany::find($this->id_selected);

        $this->validate([
            'name'   => ['required','string'],
            'email'  => ['required','email',Rule::unique('companies')->ignore($this->id_selected)->whereNull('deleted_at')],
            'pagina' => ['required','url',Rule::unique('companies')->ignore($this->id_selected)->whereNull('deleted_at')],
            'logo'   => ['nullable','image','dimensions:min_width=100,min_height=100']

        ]);

        $company->update([
            'name'   => $this->name,
            'email'  => $this->email,
            'pagina' => $this->pagina
        ]);

        if($this->logo){
            $company->logo = Storage::url($this->logo->store('public/images'));
            $company->save();
        }

        $this->emit('alertSuccess','La compañia actualizo correctamente');
        $this->emit('render');
        $this->emit('closeModal');
        $this->reset('name','email','pagina','logo');
    }

    public function destroy(ModelsCompany $company){
        $company->delete();
        $company->employees()->delete();
        $this->emit('render');
    }

    public function restart(){
        $this->resetValidation();
        $this->reset('name','email','pagina','logo','image');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
