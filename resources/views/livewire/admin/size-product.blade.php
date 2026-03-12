<div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-12">
        <div>
            <x-label>
                Talla
            </x-label>

            <x-input type="text" placeholder="Ingrese una talla" class="w-full" wire:model="name" />

            <x-input-error for="name" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Agregar
            </x-button>
        </div>
    </div>

    <ul class="mt-12 space-y-3">
        @foreach($sizes as $size)
        <li class="bg-white shadow-lg rounded-lg p-6" wire:key="size-{{$size->id}}">
            <div class="flex items-center">
                <span class="text-md font-medium">{{$size->name}}</span>

                <div class="ml-auto">
                    <x-button 
                         wire:click="edit({{$size->id}})"
                          wire:loading.attr="disabled"
                          wire:target="edit({{$size->id}})">
                        <i class="fas fa-edit"></i>
                    </x-button>

                    <x-danger-button wire:click="$emit('deleteSize',{{$size->id}})">
                        <i class="fas fa-trash"></i>
                    </x-danger-button>
                </div>
            </div>

            @livewire('admin.color-size',['size'=>$size],key('color-size'.$size->id))
        </li>
        @endforeach
    </ul>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Talla
        </x-slot>
        <x-slot name="content">
            <x-label>
                Talla
            </x-label>

            <x-input wire:model="name_edit" type="text" class="w-full" />
            <x-input-error for="name_edit"/>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open',false)" wire:loading.attr="disabled" class="ml-auto mr-2">
                Cancelar
            </x-secondary-button>

            <x-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>