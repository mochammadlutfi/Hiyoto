<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
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
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function($row){

                    foreach($row->getRoleNames() as $v){
                        $jabatan = ucwords(str_replace('-', ' ', $v));
                    }
                    return $jabatan;
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group" role="group">
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="si si-wrench mr-1"></i>Aksi
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start"
                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);
                             ">
                                <a class="dropdown-item" href="'. route('admin.user.edit', $row->id) .'">
                                    <i class="si si-note mr-5"></i>Ubah
                                </a>
                                <a class="dropdown-item btn-delete" href="javascript:void(0)" data-id="'.$row->id.'">
                                    <i class="si si-trash mr-5"></i>Hapus
                                </a>
                            </div>
                        </div>';

                    return $btn;
                })
                ->rawColumns(['nama', 'action', 'jenis', 'last_login'])
                ->make(true);
        }
        
        return view('admin.user.index');
    }

    public function add(){

        return view('admin.user.form');
    }

    public function save(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Lengkap Wajib Diisi!',
            'username.required' => 'Username Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'role.required' => 'Peran Wajib Diisi!',
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
                $data = new Admin();
                $data->name = $request->name;
                $data->username = $request->username;
                $data->email = $request->email;
                $data->password = bcrypt($request->password);
                $data->save();

                $data->assignRole($request->role);

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

    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'username.required' => 'Username Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'jabatan.required' => 'Jabatan Wajib Diisi!',
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
                $data = Admin::find($request->id);
                $data->nama = $request->nama;
                $data->username = $request->username;
                $data->email = $request->email;
                $data->password = bcrypt($request->password);
                $data->save();

                $data->assignRole($request->jabatan);

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
                'pesan' => 'Data Pengguna Berhasil Diperbaharui!'
            ]);
        }
    }

    public function edit($id){

            $data = Admin::find($id);

            return view('admin.user.edit', compact('data'));
    }

    public function hapus($id)
    {
        $user = Admin::destroy($id);
        if($user){
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
