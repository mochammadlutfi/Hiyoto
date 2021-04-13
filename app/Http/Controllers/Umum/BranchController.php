<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use App;

use App\Models\BranchOffice;

class BranchController extends Controller
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
        return view('umum.branch.index');
    }

    public function data(Request $request){

        if ($request->ajax()) {
            $daerah = $request->daerah;
            $keyword = $request->keyword;
            $data = BranchOffice::when(!empty($daerah), function ($query) use ($daerah) {
                    return $query->where('city_id', $daerah);
                })
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    return $query->where('name', 'LIKE', "%{$keyword}%");
                })
                ->latest()->paginate(4);
                
            return response()->json($data);
        }
    }


}
