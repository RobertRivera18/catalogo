<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatusOrder extends Component
{
    public $order, $status;

    public function mount()
    {
        $this->status = $this->order->status;
    }

    public function update()
    {
        $this->validate([
            'status' => 'required|in:1,2,3,4,5',
        ]);

        $this->order->status = $this->status;
        $this->order->save();

        session()->flash('success', 'Estado de la orden actualizado correctamente.');
    }

    public function render()
    {
        $rawContent = $this->order->content;

        if (empty($rawContent)) {
            $items = [];
        } else {
            $items = is_string($rawContent)
                ? json_decode($rawContent)
                : json_decode(json_encode($rawContent));
        }

        return view('livewire.status-order', compact('items'));
    }
}