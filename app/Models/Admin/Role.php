<?php

namespace App\Models\Admin;

use App\Models\Model;
use App\Models\ModelAuthenticate;
use App\Models\Admin\Module;
use App\Models\Admin\User;

class Role extends ModelAuthenticate
{
    protected $table = 'role';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }
}
