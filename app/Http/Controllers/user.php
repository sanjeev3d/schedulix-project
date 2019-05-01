<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessCategory;
use App\Business;
use App\UserBusiness;

class user extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
