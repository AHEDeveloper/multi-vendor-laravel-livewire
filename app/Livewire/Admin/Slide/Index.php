<?php

namespace App\Livewire\Admin\Slide;

use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function submit($formData)
    {

    }

    public function render()
    {
        $sliders = Slider::query()->paginate(10);
        return view('livewire.admin.slide.index',[
            'sliders' => $sliders
        ])->layout('layouts.admin.app');
    }
}
