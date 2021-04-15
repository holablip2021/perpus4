<?php

namespace App\Repositories;
use App\Models\Transaksi;


class TransaksiRepository
{
    //
    public function findById($id)
    {
        return Transaksi::with([])
        ->find($id);
    }

    public function getTransaksi()
    {
       return Transaksi::with([])->select('buku_id')->where('status','MASUK')->orwhere('status','KELUAR')->groupBy('buku_id')
            ->get();
    }

    public function getTransaksiMasuk($id)
    {
        return Transaksi::with([])->select('buku_id')->where('status','MASUK')->where('buku_id',$id)->groupBy('buku_id')->selectRaw("SUM(qty) as total")->get();
    }

    public function getTransaksiKeluar($id)
    {
        return Transaksi::with([])->select('buku_id')->where('status','KELUAR')->where('buku_id',$id)->groupBy('buku_id')->selectRaw("SUM(qty) as total")->get();
    }

    public function getTransaksiPesanan()
    {
        return Transaksi::with([])->where('status', 'PESAN')->orderby('created_at', 'ASC')->get();
    }

    public function getOutstandingOrder()
    {
        return Transaksi::with([])->where('status', 'KELUAR')->where('tgl_kembali', null)->orderby('tgl_pinjam', 'ASC')->get();
    }
    
}
