<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">
        <div class="bg-white rounded-lg shadow-lg p-4">
            <div class="mb-4">
                <x-label value="Nombre de Contacto" />
                <x-input class="w-full" type="text" wire:model.defer="contact"
                    placeholder="Ingrese el nombre de la persona que recibira el producto" />
                <x-input-error for="contact" />
            </div>

            <div>
                <x-label value="Telefono Contacto" />
                <x-input class="w-full" wire:model.defer="phone" type="text"
                    placeholder="Ingrese un numero de telefono de contacto" />
                <x-input-error for="phone" />
            </div>

        </div>



        <div x-data="{ envio_type: @entangle('envio_type') }">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-gray-600 mr-1">
                <i class="fas fa-store text-gray-700 text-xl ml-1"></i>
                <span class="ml-2 text-gray-700">
                    Recojo en tienda (Calle Falsa 123)

                </span>

                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>

            <div class="bg-white rounded-lg shadow-lg">
                <label class="px-6 py-4 flex items-center cursor-pointer">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-gray-600 mr-1">
                    <i class="fas fa-truck text-gray-700 text-xl ml-1"></i>
                    <span class="ml-2 text-gray-700">
                        Envío a domicilio
                    </span>

                </label>


                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2 }">
                    <div>
                        <x-label class="mt-3" value="Departamento" />
                        <select name=""
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                            wire:model="department_id">
                            <option value="" disabled selected>--Seleccione un departamento--</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="department_id" />
                    </div>


                    <div>
                        <x-label class="mt-3" value="Ciudad" />
                        <select name=""
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                            wire:model="city_id">
                            <option value="" disabled selected>--Seleccione una Ciudad--</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="city_id" />
                    </div>


                    <div>
                        <x-label value="Distrito" />
                        <select name=""
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                            wire:model="district_id">
                            <option value="" disabled selected>--Seleccione un Distrito--</option>
                            @foreach($districts as $district)
                            <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="district_id" />
                    </div>

                    <div>
                        <x-label value="Direccion" />
                        <x-input class="w-full" wire:model="address" type="text" />
                        <x-input-error for="address" />
                    </div>

                    <div class="col-span-2">
                        <x-label value="Referencia" />
                        <x-input class="w-full" wire:model="references" type="text" />
                        <x-input-error for="references" />
                    </div>
                </div>
            </div>

        </div>


       

    </div>
    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="col-span-1">
            <div class="bg-white rounded-lg shadow overflow-hidden mb-4">
                <div class="bg-black text-white p-4 flex justify-between">
                    <p class="font-semibold">
                        Resumen de compra ({{Cart::content()->count()}} Producto)
                    </p>
                    <a href="{{route('orders.create')}}" previewlistener="true">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
                <div class="p-4 text-gray-600">
                    <ul>
                        @forelse (Cart::content() as $item)
                        <li class="flex items-center space-x-4 space-y-2">
                            <figure class="shrink-0">
                                <img class="h-12 aspect-square" src="{{$item->options->image}}" alt="">
                            </figure>

                            <div class="flex-1">
                                <p class="text-sm">{{$item->name}}</p>
                                <p class="text-gray-500">${{$item->price}}</p>

                                <div class="flex items-center space-x-4">
                                    @isset($item->options['color'])
                                    <p class="mx-1">Color: {{$item->options['color']}}</p>
                                    @endisset
    
                                    @isset($item->options['size'])
                                    <p>Talla: {{$item->options['size']}}</p>
                                    @endisset
                                </div>
                                
                            </div>
                            <div class="shrink-0 flex items-center justify-center">
                                <p class="flex items-center justify-center rounded-full bg-gray-300 w-6 h-6 text-center text-md font-bold">
                                    {{$item->qty}}
                                </p>
                            </div>
                            
                        </li>
                        @empty
                        <li class="py-4 px-4">
                            <p class="text-center text-gray-700 ">
                                No tiene agregado ningun item en el carrito
                            </p>
                        </li>
                        @endforelse
                    </ul>
                    <hr class="mt-4 mb-3">
                    <div class="text-gray-700">
                        <p class="flex justify-between items-center">Subtotal
                            <span class="font-semibold">${{Cart::subTotal()}}</span>
                        </p>

                        <p class="flex justify-between items-center">Envio
                            <span class="font-semibold ">
                                @if ($envio_type==1|| $shipping_cost==0)
                                Gratis
                                @else
                                ${{$shipping_cost}}
                                @endif

                            </span>
                        </p>
                    
                        <p class="flex justify-between items-center font-semibold">
                            <span class="text-lg">Total</span>

                            @if ($envio_type==1)
                            ${{Cart::subTotal()}}
                            @else
                            ${{Cart::subTotal()+ $shipping_cost}}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <a class=" cursor-pointer outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-white bg-green-500 dark:bg-green-700 hover:text-white hover:bg-green-600 dark:hover:bg-green-600 focus:text-white focus:ring-offset-2 focus:bg-green-600 focus:ring-green-600 dark:focus:bg-green-600 dark:focus:ring-green-600 rounded-md gap-x-2 text-sm px-4 py-2 w-full"
            wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4"
            wire:click="create_order">
                Siguiente
            </a>
        </div>
    </div>


</div>