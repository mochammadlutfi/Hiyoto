<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dinas;
use App\Models\Kota;
use App\Models\Fraksi;

class GeneralController extends Controller
{

    /**
     * Menampilkan Data Kota Untuk Select2
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function daerahSelect(Request $request)
    {
        if($request->has('searchTerm')){
            $cari = $request->searchTerm;
                $fetchData = Kota::where('name','LIKE',  '%' . $cari .'%')->get();
            $data = array();
            foreach($fetchData as $row) {
                $data[] = array(
                    "id" => $row->id,
                    "text" => ucwords(strtolower($row->name)).', '. ucwords(strtolower($row->provinsi->name)),
                );
            }
            return response()->json($data);
        }
    }

}
