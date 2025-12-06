<?php

namespace App\Livewire\Admin\Weblog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $blogs = Blog::query()->paginate(10);
        return view('livewire.admin.weblog.index',[
            'blogs' => $blogs
        ])->layout('layouts.admin.app');
    }
}
