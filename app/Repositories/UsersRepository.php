<?php

namespace App\Repositories;
use App\Models\Users;
class UsersRepository
{
    //
    public function findByUserId($id)
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
        return Users::with(['transaksi'])
        ->find($id);
    }


}
