<?php

namespace App\Http\Controllers;

use App\UsersRepository;
use App\CrudUsersServices;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    protected $userRepo, $userServices;

    //
    public function __construct()
    {
        $this->userRepo = new UsersRepository;
        $this->userServices = new CrudUsersServices;
        session()->regenerate();
        session()->reflash('status');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        session()->flush();
        return redirect(url('/pengguna/login'));
    }

    public function cekLogin(Request $request)
    {
        $results = $this->userServices->validasi_user($request->post());
        if (!$results) {
            return redirect(url('/pengguna/login'));
        }
        session()->flash('status', $results['pesan']);
        return redirect('/');
    }    

    public function index()
    {
        $results =  $this->userRepo->getUsers();
        return view('listing-users', compact('results'));
    }

    public function registrasi(Request $request)
    {   
        $results = $this->userServices->create($request);
        if (!$results) {
            return redirect()->back();
        }
        session()->flash('status', $results['pesan']);
        return view('login',compact('results'));
    }


    public function transaksi()
    {
        $results = $this->userRepo->findUserTransaksi(session()->get('user_id'));
        if(!$results){
            return redirect()->back();
        }
        return view('listing-transaksi', compact('results'));
    }
    
}
