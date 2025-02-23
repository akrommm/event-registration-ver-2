<?php

namespace App\Models\Admin;

use App\Models\Admin\Role as AdminRole;
use App\Models\Model;
use App\Models\ModelAuthenticate;

class Module extends ModelAuthenticate
{
    protected $table = 'admin__module';

    public function role()
    {
        return $this->hasMany(AdminRole::class, 'id_module');
    }
}
