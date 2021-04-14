<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    //
    protected $table = 'rak';

    public function bukuRak()
    {
        return $this->hasMany('App\Buku', 'rak_id', 'id');
    }

}
