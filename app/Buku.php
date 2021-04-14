<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'buku';

    public function bukuRak()
    {
        return $this->hasMany('App\Rak', 'id', 'rak_id');
    }
    
    
    
}
