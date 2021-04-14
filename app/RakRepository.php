<?php

namespace App;
use App\Rak;
use Validator;

class RakRepository
{
    //
    public function findById($id)
    {
        return Rak::with([])
        ->find($id);
    }

    public function getRak()
    {
       return Rak::with(['bukuRak'])
            ->get();
    }

}
