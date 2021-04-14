<?php

namespace App\Http\Controllers\Admin;

use App\Models\RetailStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RetailStoreController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Menampilkan Index Kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword === '' ? '' : $request->keyword;

            $data = RetailStore::where('name', 'like', '%' . $request->keyword . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

            return response()->json($data);
        }
        return view('admin.retail.index');

    }

    public function add()
    {
        
        return view('admin.retail.form');
    }

    public function save(Request $request)
    {

        $rules = [
            'name' => 'required',
            'daerah' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Toko Wajib Diisi!',
            'daerah.required' => 'Daerah Toko Wajib Diisi!',
            'postal_code.required' => 'Kode Pos Toko Wajib Diisi!',
            'address.required' => 'Alamat Toko Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            DB::beginTransaction();
            try{

                $data = new RetailStore();
                $data->name = $request->name;
                $data->city_id = $request->daerah;
                $data->postal_code = $request->postal_code;
                $data->address = $request->address;
                $data->lat = $request->lat;
                $data->lng = $request->lng;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            
            DB::commit();
            return response()->json([
                'fail' => false,
                'pesan' => 'Kategori Baru Berhasil Ditambahkan!'
            ]);
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'daerah' => 'required',
            'postal_code' => 'required',
            'address' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Toko Wajib Diisi!',
            'daerah.required' => 'Daerah Toko Wajib Diisi!',
            'postal_code.required' => 'Kode Pos Toko Wajib Diisi!',
            'address.required' => 'Alamat Toko Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                $data = RetailStore::find($request->id);
                $data->name = $request->name;
                $data->city_id = $request->daerah;
                $data->postal_code = $request->postal_code;
                $data->address = $request->address;
                $data->lat = $request->lat;
                $data->lng = $request->lng;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($id){
        $data = RetailStore::findOrFail($id);

        return view('admin.retail.edit', compact('data'));
    }

    public function delete($id)
    {
        $data = RetailStore::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]); 
        }
    }
}
