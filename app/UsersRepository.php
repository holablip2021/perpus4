<?php

namespace App;
use App\Users;
class UsersRepository
{
    //
    public function findById($id)
    {
        return Users::with([])
        ->find($id);
    }

    public function getUsers()
    {
       return Users::with([])
            ->get();
    }

    public function findUserTransaksi($id)
    {
        return Users::with(['getUserTransaksi'])
        ->find($id);
    }


}
