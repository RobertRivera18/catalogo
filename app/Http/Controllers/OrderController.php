<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Orders::query()->where('user_id', auth()->user()->id);
        if (request('status')) {
            $orders->where('status', request('status'));
        }
        $orders = $orders->get();
        $pendiente = Orders::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Orders::where('status', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Orders::where('status', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Orders::where('status', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Orders::where('status', 5)->where('user_id', auth()->user()->id)->count();
        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }
    public function show(Orders $order)
    {
        // $this->authorize('author', $order);
        $items = json_decode($order->content);
        $envio = json_decode($order->envio);
        return view('orders.show', compact('order', 'items', 'envio'));
    }

    public function cancel(Orders $order)
    {
        // seguridad: que sea del usuario
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // solo cancelar si está pendiente
        if ($order->status != 1) {
            return back()->with('error', 'No puedes cancelar esta orden');
        }

        $items = collect(json_decode($order->content));

        foreach ($items as $item) {

            $product = Product::find($item->id);

            if ($product) {
                $product->increment('quantity', $item->qty);
            }

            // 🔥 si tienes variantes (talla/color)
            if (isset($item->options->size_id)) {
                $product->sizes()
                    ->where('id', $item->options->size_id)
                    ->increment('pivot.quantity', $item->qty);
            }
        }

        $order->status = 5; // anulado
        $order->save();

        return back()->with('success', 'Orden cancelada correctamente');
    }
}
