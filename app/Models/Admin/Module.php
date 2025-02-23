<?php

namespace App\Models\Admin;

use App\Models\Admin\Role;
use App\Models\Model;
use App\Models\ModelAuthenticate;

class Module extends ModelAuthenticate
{
    protected $table = 'module';

    public function role()
    {
        return $this->hasMany(Role::class, 'id_module');
    }
}
