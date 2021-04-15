<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'buku';

    public function buku_rak()
    {
        return $this->hasMany('App\Models\Rak', 'id', 'rak_id');
    }

    public function buku_transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'buku_id', 'id');
    }
    
    
}
