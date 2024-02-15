<?php

namespace App\Livewire;

use App\Models\Farmer;
use App\Models\PickPoint;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class FarmersList extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search = '';

    #[Url(history:true)]
    public $admin = '';

    #[Url(history:true)]
    public $sortBy = 'created_at';

    #[Url(history:true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;


    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete(Farmer $farmer){
        $farmer->delete();
    }

    public function setSortBy($sortByField){

        if($this->sortBy === $sortByField){
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.farmers-list',
            [
                'farmers' => Farmer::search($this->search)
                    ->when($this->admin !== '',function($query){
                        $query->where('is_admin',$this->admin);
                    })
                    ->orderBy($this->sortBy,$this->sortDir)
                    ->paginate($this->perPage)
            ]
        );
    }
}
