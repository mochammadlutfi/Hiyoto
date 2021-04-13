<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use App\Models\RetailStore;

class StoreController extends Controller
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
     * Show Store Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('umum.retail.index');
    }

    public function data(Request $request){

        if ($request->ajax()) {
            $daerah = $request->daerah;
            $keyword = $request->keyword;
            $data = RetailStore::when(!empty($daerah), function ($query) use ($daerah) {
                    return $query->where('city_id', $daerah);
                })
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    return $query->where('name', 'LIKE', "%{$keyword}%");
                })
                ->latest()->paginate(4);

            // return response()->json([
            //     'html' => view('umum.retail.data', compact('data'))->render(),
            //     ''
            // ]);
            return response()->json($data);
        }
    }


}
