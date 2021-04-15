<?php

namespace App\Repositories;
use App\Models\Buku;
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
        return Buku::with(['buku_rak'])
            ->get();
    }

}
