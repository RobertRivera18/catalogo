<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();

        $orders = Orders::query()->where('user_id', $userId);

        if ($request->filled('status')) {
            $orders->where('status', $request->input('status'));
        }

        $orders = $orders->latest()->get();

        $pendiente = Orders::where('status', 1)->where('user_id', $userId)->count();
        $recibido  = Orders::where('status', 2)->where('user_id', $userId)->count();
        $enviado   = Orders::where('status', 3)->where('user_id', $userId)->count();
        $entregado = Orders::where('status', 4)->where('user_id', $userId)->count();
        $anulado   = Orders::where('status', 5)->where('user_id', $userId)->count();

        return view('orders.index', compact(
            'orders',
            'pendiente',
            'recibido',
            'enviado',
            'entregado',
            'anulado'
        ));
    }

    public function show(Orders $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $items = $this->parseJsonField($order->content);
        $envio = $this->parseJsonField($order->envio ?? null);

        return view('orders.show', compact('order', 'items', 'envio'));
    }

    public function cancel(Orders $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if ($order->status != 1) {
            return back()->with('error', 'No puedes cancelar esta orden');
        }

        $items = collect($this->parseJsonField($order->content));

        foreach ($items as $item) {
            $product = Product::find($item->id);

            if ($product) {
                $product->increment('quantity', $item->qty);

                if (isset($item->options->size_id)) {
                    $product->sizes()
                        ->where('id', $item->options->size_id)
                        ->increment('pivot.quantity', $item->qty);
                }
            }
        }

        $order->status = 5; 
        $order->save();

        return back()->with('success', 'Orden cancelada correctamente');
    }


    private function parseJsonField($value): array
    {
        if (empty($value)) {
            return [];
        }

        $decoded = is_string($value)
            ? json_decode($value)
            : json_decode(json_encode($value));

        return is_array($decoded) ? $decoded : [];
    }
}