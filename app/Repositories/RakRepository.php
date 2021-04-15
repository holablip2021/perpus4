<?php

namespace App\Repositories;
use App\Models\Rak;
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
       return Rak::with([])
            ->get();
    }

}
