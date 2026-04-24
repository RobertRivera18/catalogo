<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Orders;
use Livewire\Component;
use App\Models\District;
use App\Models\Department;
use Gloudemans\Shoppingcart\Facades\Cart;
use Symfony\Contracts\Service\Attribute\Required;

class CreateOrder extends Component
{

    public $envio_type = 1;
    public $contact, $phone, $address, $references, $identification_number, $provincia, $ciudad;
    public $identification_type;
    public $shipping_cost = 10;
    public $departments, $cities = [], $districts = [];
    public $department_id = "", $city_id = "", $district_id = "";

    protected function rules()
    {
        return [
            'contact' => 'required',
            'phone' => 'required',
            'envio_type' => 'required',
            'identification_type' => 'required',
            'identification_number' => [
                'required',
                $this->identification_type === 'ruc' ? 'size:13' : 'size:10',
            ],
        ];
    }


    public function Mount()
    {
        $this->departments = Department::all();
    }

    public function updatedEnvioType($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'department_id',
                'city_id',
                'district_id',
                'address',
                'references'
            ]);
        }
    }

    public function updatedDepartmentId($value)
    {
        $this->cities = City::where('department_id', $value)->get();
        $this->reset(['city_id', 'district_id']);
    }

    public function updatedCityId($value)
    {

        $city = City::find($value);
        $this->shipping_cost = $city->cost;
        $this->districts = District::where('city_id', $value)->get();
        $this->reset('district_id');
    }


    public function create_order()
    {

        $rules = $this->rules();

        if ($this->envio_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
            $rules['provincia'] = 'required';
            $rules['ciudad'] = 'required';
        }

        $this->validate($rules);

        $order = new Orders();

        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->identification_type = $this->identification_type;
        $order->identification_number = $this->identification_number;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 10;
        $order->total = str_replace(',', '', Cart::subtotal()) + $this->shipping_cost;
        $order->content = Cart::content();

        if ($this->envio_type == 2) {
            $order->shipping_cost = $this->shipping_cost;
            $order->provincia = $this->provincia;
            $order->ciudad = $this->ciudad;
            $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address;
            $order->references = $this->references;
        }
        $order->save();
        foreach (Cart::content() as $item) {
            discount($item);
        }
        Cart::destroy();
        return redirect()->route('orders.payment', $order);
    }


    public function render()
    {
        return view('livewire.create-order');
    }
}
