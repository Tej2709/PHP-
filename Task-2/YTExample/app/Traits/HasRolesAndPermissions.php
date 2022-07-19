<?php

namespace App\Traits;

use App\Models\Role as ModelsRole;
use App\Models\Role;
use App\Models\permission;
Trait HasRolesAndPermissions
{
   

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }
   
}




?>