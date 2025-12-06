<?php

namespace App\Livewire\Admin\AdminUser;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $admins = Admin::query()->paginate(10);
        return view('livewire.admin.admin-user.index',[
            'admins' => $admins
        ])->layout('layouts.admin.app');
    }
}
