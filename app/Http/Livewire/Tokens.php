<?php

namespace App\Http\Livewire;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Token;

//dependencias Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class Tokens extends Component
{
    use WithPagination;

   /*  function __construct()
    {
        $this->middleware('permission:view-token|create-token|edit-token|delete-token', ['only'=>['index']]);
        $this->middleware('permission:create-token', ['only'=>['create','store']]);
        $this->middleware('permission:edit-token', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-token', ['only'=>['destroy']]);
    } */

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $typeform_token;
    public $validationArray = [
        'typeform_token' => 'required',
    ];
    public function data () {
        return [
            'typeform_token' => $this-> typeform_token
    ];}
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tokens.view', [
            'tokens' => Token::latest()
						->orWhere('typeform_token', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->typeform_token = null;
    }

    public function store()
    {
        $this->validate($this->validationArray);

        Token::create($this->data());
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Token creado correctamente.');
    }

    public function edit($id)
    {
        $record = Token::findOrFail($id);

        $this->selected_id = $id; 
		$this->typeform_token = $record-> typeform_token;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate($this->validationArray);

        if ($this->selected_id) {
			$record = Token::find($this->selected_id);
            $record->update($this->data());

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Token actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Token::where('id', $id);
            $record->delete();
        }
    }
}
