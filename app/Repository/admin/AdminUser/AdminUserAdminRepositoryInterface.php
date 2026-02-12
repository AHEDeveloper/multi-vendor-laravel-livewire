<?php

namespace App\Repository\admin\AdminUser;

interface AdminUserAdminRepositoryInterface
{
    public function submitAdmin($formData, $password);
    public function findAdmin($admin_id);


}
