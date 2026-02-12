<?php

namespace App\Livewire\Admin\AdminUser;

use App\Models\Admin;
use App\Repository\admin\AdminUser\AdminUserAdminRepositoryInterface;
use App\Services\admin\validation\ServiceAdminUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $roles = [];
    public $permissions = [];
    public $name,$mobile,$email,$result = 7;
    public $search;
    public $selectedRoles = [];
    public $selectedPermissions = [];
    private $repository;

    public function boot(AdminUserAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function submit($formData,ServiceAdminUser $service)
    {
        $formData['selectedRoles'] = $this->selectedRoles;
        $formData['selectedPermissions'] = $this->selectedPermissions;
        $service->adminValidation($formData)->validate();

        $password = $service->generatePassword($length = 12);
        $admin = $this->repository->submitAdmin($formData,$password);
        $admin->roles()->sync($this->selectedRoles);
        $admin->permissions()->sync($this->selectedPermissions);

        $this->resetValidation();
        session()->flash('message','پسورد شما با موفیقت ایجاد شد,پسورد:'.$password);
    }

    public function delete($admin_id)
    {
        $admin = $this->repository->findAdmin($admin_id);
        if ($admin)
        {
            $admin->delete();
        }
        $this->dispatch('success','حذف ادمین انجام شد');
    }


    public function render()
    {
        $search = $this->search;
        $admins = Admin::query()
            ->when($search,function ($q) use ($search){
                $q->where('email','like','%'.$search.'%');
            })
            ->with('roles.permissions')
            ->paginate($this->result);

        return view('livewire.admin.admin-user.index',[
            'admins' => $admins
        ])->layout('layouts.admin.app');
    }
}
