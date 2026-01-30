<?php

namespace App\Livewire\Admin\Weblog;

use Livewire\Component;

class Create extends Component
{
    public $longDescription;
    public function render()
    {
        return view('livewire.admin.weblog.createWeblog.index')->layout('layouts.admin.app');
    }
}
