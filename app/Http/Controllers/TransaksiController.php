<?php

namespace App\Http\Controllers;

use App\TransaksiRepository;
use App\RakRepository;
use App\BukuRepository;
use App\CrudTransaksiServices;

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
        if(!$results){
        return redirect()->back();    
        }
        session()->flash('status', $results['pesan']);
        return view('order', compact('results'));
    }

    public function order($id = null,Request $request){
        $results = $this->transaksiServices->memberOrder($id,$request);
        if (!$results) {
            return redirect()->back();
        }
        session()->flash('status', $results['pesan']);
        return redirect(url('/produk/list'));
    }    

    //pesanan
    public function pesanan()
    {
        $results = $this->transaksiRepo->getTransaksiPesanan();        
        return view('listing-pesanan', compact('results'));
    }

    //transaksi keluar
    public function keluar($id = null,Request $request){
        $results = $this->transaksiServices->updateTransaksiKeluar($id, $request);
        if (!$results) {
            return redirect()->back();
        }
        session()->flash('status', $results['pesan']);
        return redirect(url('/pesanan/list'));
    }

    public function penerimaan()
    {
        $results = $this->transaksiRepo->getOutstandingOrder();        
        return view('listing-penerimaan', compact('results'));
    }

    //transaksi masuk
    public function masuk($id = null, Request $request)
    {
        $results = $this->transaksiServices->updateTransaksiMasuk($id, $request);
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
        $results = $this->transaksiServices->transaksiPenyesuaian($request);
        session()->flash('status', $results['pesan']); 
        if(!$results){
            return redirect(url('/penyesuaian'));
        }
        return redirect(url('/penyesuaian'));
    }    

}
