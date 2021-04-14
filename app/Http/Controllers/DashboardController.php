<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //
    public function __construct(){
       
    }

    public function index(){
        //cek session bila tidak ada,akan muncul form login
        if(!session()->exists('main')){
            return view('login');
        }
            return view(session()->get('main'));        
    }
}
