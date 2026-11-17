<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DropdownCart extends Component
{
    public $paso = 1;

    public $tipoEntrega = 'Domicilio';
    public $nombre = '';
    public $celular = '';
    public $direccion = '';
    public $comentarios = '';

    protected $listeners = ['render', 'cart-updated' => 'render'];

    public function delete($rowId)
    {
        Cart::remove($rowId);

        if (Cart::count() == 0) {
            $this->paso = 1;
        }

        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('shopping-cart', 'render');
    }

    public function destroy()
    {
        Cart::destroy();
        $this->paso = 1;

        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('shopping-cart', 'render');
    }

    public function irAFormulario()
    {
        if (Cart::count() > 0) {
            $this->paso = 2;
        }
    }

    public function volverAlCarrito()
    {
        $this->paso = 1;
    }

    public function enviarWhatsApp()
    {
        if (Cart::count() == 0) {
            $this->paso = 1;
            return;
        }

        $rules = [
            'nombre' => 'required|min:3',
            'celular' => 'required',
        ];

        if ($this->tipoEntrega === 'Domicilio') {
            $rules['direccion'] = 'required';
        }

        $this->validate($rules);

        $subtotal = floatval(str_replace(',', '', Cart::subtotal()));
        $esDomicilio = $this->tipoEntrega === 'Domicilio';

        $items = Cart::content()->values()->map(fn ($item) => [
            'id' => $item->id,
            'name' => $item->name,
            'qty' => $item->qty,
            'price' => $item->price,
            'subtotal' => $item->price * $item->qty,
            'options' => (object) $item->options->toArray(),
        ])->all();

        $order = DB::transaction(function () use ($subtotal, $esDomicilio, $items) {
            foreach ($items as $item) {
                Product::find($item['id'])?->decrement('quantity', $item['qty']);
            }

            return Orders::create([
                'user_id' => Auth::id(), 
                'contact' => $this->nombre,
                'phone' => $this->celular,
                'source' => 'whatsapp',
                'envio_type' => $esDomicilio ? '2' : '1', 
                'shipping_cost' => 0,
                'total' => $subtotal,
                'content' => json_encode($items),
                'address' => $esDomicilio ? $this->direccion : null,
                'references' => $this->comentarios ?: null,
            ]);
        });

        $mensaje = "📋 *NUEVO PEDIDO #{$order->id}*\n\n";
        $mensaje .= "👤 *Cliente:* " . $this->nombre . "\n";
        $mensaje .= "📱 *Celular:* " . $this->celular . "\n";
        $mensaje .= "🚚 *Tipo de Entrega:* " . $this->tipoEntrega . "\n";

        if ($esDomicilio) {
            $mensaje .= "📍 *Dirección:* " . $this->direccion . "\n";
        }

        if ($this->comentarios) {
            $mensaje .= "💬 *Notas:* " . $this->comentarios . "\n";
        }

        $mensaje .= "\n📦 *DETALLE DEL PEDIDO:*\n";
        foreach ($items as $item) {
            $mensaje .= "• *" . $item['name'] . "* (x" . $item['qty'] . ") - $" . number_format($item['subtotal'], 2) . "\n";
        }

        $mensaje .= "\n💰 *TOTAL A PAGAR: $" . number_format($subtotal, 2) . "*";

        Cart::destroy();
        $this->reset(['nombre', 'celular', 'direccion', 'comentarios']);
        $this->paso = 1;
        $this->emitTo('shopping-cart', 'render');

        return redirect()->away("https://wa.me/1234567890?text=" . rawurlencode($mensaje));
    }

    public function render()
    {
        return view('livewire.dropdown-cart');
    }
}