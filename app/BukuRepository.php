<?php

namespace App;
use App\Buku;
class BukuRepository
{
    //
    public function findById($id)
    {
        return Buku::with([])
        ->find($id);
    }

    public function getBuku()
    {
        return Buku::with(['bukuRak'])
            ->get();
    }

}
