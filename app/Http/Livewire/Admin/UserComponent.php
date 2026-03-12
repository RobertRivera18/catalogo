<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{

    use WithPagination;
    public $search;


    public function assignRole(User $user, $value)
    {
        if($value=='1'){
               $user->assignRole('admin');
        } else{
            $user->removeRole('admin');
        }
    }
    public function updatingdSearch()
    {
        $this->resetPage();
    }
    public function render()

    {
        $users = User::where('email','<>',auth()->user()->email)
            ->where(function($query){
                $query->where('name', 'LIKE', '%' . $this->search . '%');
                $query->where('email', 'LIKE', '%' . $this->search . '%');
            })->paginate();
        return view('livewire.admin.user-component', compact('users'))->layout('layouts.admin');
    }
}
