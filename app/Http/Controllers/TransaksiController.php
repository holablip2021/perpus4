<?php

namespace App\Http\Controllers;

use App\Repositories\TransaksiRepository;
use App\Repositories\RakRepository;
use App\Repositories\BukuRepository;
use App\Services\CrudTransaksiServices;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    protected $transaksiRepo, $bukuRepo, $rakRepo, $transaksiServices;

    //
    public function __construct()
    {
        
        $this->transaksiRepo = new TransaksiRepository;
        $this->bukuRepo = new BukuRepository;
        $this->rakRepo = new RakRepository;
        $this->transaksiServices = new CrudTransaksiServices;
        session()->reflash('status');
    }

    public function index()
    {        
        $results =  $this->bukuRepo->getBuku();
        return view('catalog', compact('results'));
    }

    public function cekStok($id = null){
        $results = $this->transaksiServices->stok($id);
        session()->flash('status', $results['pesan']);
        if(!$results){
        return redirect()->back();    
        }
        return view('order', compact('results'));
    }

    public function order(Request $request, $id = null){
        $results = $this->transaksiServices->memberOrder($request, $id, 'PESAN');
        session()->flash('status', $results['pesan']);
        if (!$results) {
            return redirect()->back();
        }
        return redirect(url('/produk/list'));
    }    

    //pesanan
    public function pesanan()
    {
        $results = $this->transaksiRepo->getTransaksiPesanan();        
        return view('listing-pesanan', compact('results'));
    }

    //transaksi keluar
    public function keluar(Request $request, $id = null){
        $results = $this->transaksiServices->updateTransaksiKeluar($request,$id, 'KELUAR');
        session()->flash('status', $results['pesan']);
        if (!$results) {
            return redirect()->back();
        }
        return redirect(url('/pesanan/list'));
    }

    public function penerimaan()
    {
        $results = $this->transaksiRepo->getOutstandingOrder();        
        return view('listing-penerimaan', compact('results'));
    }

    //transaksi masuk
    public function masuk(Request $request,$id = null)
    {
        $results = $this->transaksiServices->updateTransaksiMasuk($request,$id, 'SELESAI');
        if (!$results) {
            return redirect()->back();
        }
        session()->flash('status', $results['pesan']);
        return redirect(url('/penerimaan/list'));        
    }

    //transaksi adjustment
    public function adjustmentSaldo()
    {
        $resultsRak = $this->rakRepo->getRak();
        return view('adjustment',compact('resultsRak'));
    }

    public function adjustmentMasuk(Request $request){
        $results = $this->transaksiServices->transaksiPenyesuaian($request, 'MASUK');
        session()->flash('status', $results['pesan']); 
        if(!$results){
            return redirect()->back();
        }
        return redirect(url('/penyesuaian'));
    }    

}
