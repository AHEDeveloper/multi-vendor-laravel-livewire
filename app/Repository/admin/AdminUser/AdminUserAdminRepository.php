<?php

namespace App\Repository\admin\AdminUser;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUserAdminRepository implements AdminUserAdminRepositoryInterface
{

    public function submitAdmin($formData, $password)
    {
        return Admin::query()->create([
            'name' => $formData['name'],
            'email' => $formData['email'],
            'mobile' => $formData['mobile'],
            'password' => Hash::make($password)
        ]);
    }

    public function findAdmin($admin_id)
    {
        return Admin::query()->where('id',$admin_id)->first();
    }


}
