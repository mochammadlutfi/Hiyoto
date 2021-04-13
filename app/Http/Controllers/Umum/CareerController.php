<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use App;

class CareerController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        return view('umum.career.index');
    }


}
