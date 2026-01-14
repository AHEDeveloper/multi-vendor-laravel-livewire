<?php

namespace App\Livewire\Admin\Auth;

use App\Services\admin\validation\ServiceAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Index extends Component
{

    public function submit($formData,ServiceAuth $service)
    {
        $service->authValidation($formData)->validate();
        $credentials = ['email' => $formData['email'], 'password' => $formData['password']];
        $admin = Auth::guard('admin');
        if ($admin->attempt($credentials)) {
            return redirect(route('admin.dashboard.index'));
        } else {
            session()->flash('message', 'رمز یا ایمیل اشتباه هست دوباره سعی کنید');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.auth.login'));
    }

    public function render()
    {
        return view('livewire.admin.auth.index')->layout('layouts.admin.auth');
    }
}
