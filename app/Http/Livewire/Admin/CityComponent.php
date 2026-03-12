<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class CityComponent extends Component
{

    public function mount(City $city)
    {
        $this->city = $city;
        $this->getDistricts();
    }
    protected $listeners = ['delete'];

    public $district, $districts, $city;

    public $createForm = [
        'name' => '',
    ];

    public $editForm = [
        'open' => false,
        'name' => ''
    ];
    public function getDistricts()
    {
        $this->districts = District::where('city_id', $this->city->id)->get();
    }

    protected $validationAttributes = [
        'createForm.name' => 'nombre'
    ];

    public function save()
    {

        $this->validate([
            "createForm.name" => 'required'
        ]);

        $this->city->districts()->create($this->createForm);
        $this->reset('createForm');
        $this->getDistricts();
        $this->emit('saved');
    }


    public function edit(District $district)
    {
        $this->district = $district;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $district->name;
    }

    public function update()
    {
        $this->district->name = $this->editForm['name'];
        $this->district->save();
        $this->reset('editForm');
        $this->getDistricts();
    }


    public function delete(District $district)
    {
        $district->delete();
        $this->getDistricts();
    }
    public function render()
    {
        return view('livewire.admin.city-component')->layout('layouts.admin');
    }
}
