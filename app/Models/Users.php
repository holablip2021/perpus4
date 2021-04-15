<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'user_id', 'id');
    }

    public function user_role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }


}
