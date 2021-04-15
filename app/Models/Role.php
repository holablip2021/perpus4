<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'role';

    public function user_role()
    {
        return $this->hasMany('App\Models\Users', 'role_id', 'id');
    }

    
}
