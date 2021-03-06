<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Promo;
use App\Models\School;
class Promos extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $school_id, $name, $ubication, $start_date, $duration, $url, $image, $imageOld, $code;
     
	public $validationArray = [
        'name' => 'required',
        'ubication' => 'required',
        'start_date' => 'required',
        'duration' => 'required',
        'image' => 'image|max:1024', // 1MB Max
        'url' => 'required',
        'code' => 'required'
    ];

    public $validationArrayWithoutImage = [
        'name' => 'required',
        'ubication' => 'required',
        'start_date' => 'required',
        'duration' => 'required',
        'url' => 'required',
        'code' => 'required'
    ];

    public function data () {
        return [
            'name' => $this->name,
            'ubication' => $this->ubication,
            'start_date' => $this->start_date,
            'duration' => $this->duration,
            'image' => $this->image->store('uploads', 'public'),
            'url' => $this->url,
            'code' => $this->code
    ];}

    public function dataUpdated ($updatedImage) {
        return [
            'name' => $this->name,
            'ubication' => $this->ubication,
            'start_date' => $this->start_date,
            'duration' => $this->duration,
            'image' => $updatedImage,
            'url' => $this->url,
            'code' => $this->code
    ];}
    
    public $updateMode = false;

    public function dataSchool() {
        return [
            'school_id' => $this->school_id,
        ];
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';    
		return view('livewire.promos.view', [
            'promos' => Promo::with('school')
                        ->orWhere('name', 'LIKE', $keyWord)
                        ->orWhere('ubication', 'LIKE', $keyWord)
                        ->orWhere('start_date', 'LIKE', $keyWord)
                        ->orWhere('duration', 'LIKE', $keyWord)
                        ->orWhere('image', 'LIKE', $keyWord)
                        ->orWhere('url', 'LIKE', $keyWord)
                        ->orWhere('code', 'LIKE', $keyWord)
						->paginate(10),
            'schools' => School::all()
        ]);

    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
        $this->name = null;	
        $this->ubication = null;
        $this->start_date = null;
        $this->duration = null;
        $this->image = null;
        $this->url = null;
        $this->code = null;
    }

    public function store()
    {
        $this->validate($this->validationArray);

        $dataStore = Promo::create($this->data());     
        Promo::addToPivotTable($dataStore, $this->dataSchool());
       
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Promo creada correctamente.');
    }

    public function edit($id)
    {
        $record = Promo::findOrFail($id);

        $this->selected_id = $id;

        $this->name = $record->name;
        $this->ubication = $record->ubication;
        $this->start_date = $record->start_date;
        $this->duration = $record->duration;
        $this->imageOld = $record->image;
        $this->url = $record->url;
        $this->code = $record->code;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $updatedImage = '';

        if($this->image == null) {
            $this->validate($this->validationArrayWithoutImage);
            $updatedImage = $this->imageOld;
        }else{  
            $this->validate($this->validationArray);          
            $updatedImage = $this->image->store('uploads', 'public');
        }

        if ($this->selected_id) {
			$record = Promo::find($this->selected_id);
            $record->update($this->dataUpdated($updatedImage));

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Promo actualizada correctamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Promo::where('id', $id);
            $record->delete();
        }
    }
}