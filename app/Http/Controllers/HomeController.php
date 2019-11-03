<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $adminemail='';//add the email of admin
    public function adminshow()
    {
        if(Auth::user()->email==$this->adminemail)
        {return view('adminhome');}
        return view('home');
    }

    public function show()
    {
        
        if(Auth::user()->email==$this->adminemail)
        {
            return view('adminhome');
        }
       else
       {
           return view('home');
        }
    }
}
