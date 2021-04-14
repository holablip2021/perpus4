<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';

    public function getUserTransaksi()
    {
        return $this->hasMany('App\Transaksi', 'user_id', 'id');
    }

    public function getUserRole()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }


}
