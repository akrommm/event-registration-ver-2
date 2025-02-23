<?php

namespace App\Models\Admin;

use App\Models\Admin\Module as AdminModule;
use App\Models\Model;
use App\Models\ModelAuthenticate;

class Role extends ModelAuthenticate
{
    protected $table = 'admin__role';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function module()
    {
        return $this->belongsTo(AdminModule::class, 'id_module');
    }
}
