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
class AdminController extends Controller
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
                ->addColumn('jabatan', function($row){

                    foreach($row->getRoleNames() as $v){
                        $jabatan = ucwords(str_replace('-', ' ', $v));
                    }
                    return $jabatan;
                })
                ->addColumn('action', function($row){
                    $btn = '<center><button  type="button" class="btn btn-outline-primary btn-sm mr-1 btn-edit" data-id="'. $row->id .'"><i class="fa fa-edit mr-1"></i>Edit</button>';
                    $btn .= '<button type="button"class="btn btn-danger btn-sm btn-hapus" data-id="'. $row->id .'"><i class="fa fa-trash mr-1"></i>Hapus</button></center>';
                    return $btn;
                })
                ->rawColumns(['img', 'action', 'jabatan', 'tgl'])
                ->make(true);
        }
        return view('admin.pengelola');
    }


    public function simpan(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'konf_password' => 'required',
            'jabatan' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'username.required' => 'Username Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'konf_password.required' => 'Konfirmasi Password Wajib Diisi!',
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
                $data = new Admin();
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
                'pesan' => 'Pengguna Baru Berhasil Ditambahkan!'
            ]);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());

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
        if($data){

            $user = collect([
                'id' => $data->id,
                'nama' => $data->nama,
                'username' => $data->username,
                'email' => $data->email,
                'jabatan' => $data->getRoleNames()->first(),
            ]);

            return response()->json($user);
        }
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

    public function pengaturan(Request $request)
    {
        if($request->isMethod('get')){
            return view('pengguna.pengaturan');
        }else{
            $rules = [
                'nip' => [
                    'required',
                    Rule::unique('users')->ignore(Auth::user()->id),
                ],
                'nama' => 'required',
                'username' => [
                    'required',
                    Rule::unique('users')->ignore(Auth::user()->id),
                ],
                'email' => [
                    'required',
                    Rule::unique('users')->ignore(Auth::user()->id),
                ],
            ];

            $pesan = [
                'nip.required' => 'NIP Wajib Diisi!',
                'nip.unique' => 'NIP Sudah Digunakan. Gunakan NIP Lain!',
                'nama.required' => 'Nama Lengkap Wajib Diisi!',
                'username.required' => 'Username Wajib Diisi!',
                'username.unique' => 'Username Sudah Digunakan. Gunakan Username Lain!',
                'email.required' => 'Email Wajib Diisi!',
                'email.unique' => 'Email Sudah Digunakan. Gunakan Email Lain!',
            ];

            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()){
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            }else{

                $data = User::find(Auth::user()->id);
                $data->nip = $request->nip;
                $data->nama = $request->nama;
                $data->username = $request->username;
                $data->email = $request->email;
                if($data->save())
                {
                    return response()->json([
                        'fail' => false,
                    ]);
                }
            }


        }
    }

    public function ubah_pw(Request $request)
    {

        $rules = [
            'pw_lama' => 'required',
            'pw_baru' => 'min:6|required_with:konf_pw_baru|same:konf_pw_baru',
            'konf_pw_baru' => 'min:6',
        ];

        $pesan = [
            'pw_lama.required' => 'Kata Sandi Lama Wajib Diisi!',
            'pw_baru.required' => 'Kata Sandi Baru Wajib Diisi!',
            'konf_pw_baru.required' => 'Konfirmasi Kata Sandi Baru Wajib Diisi!',
            'pw_baru.same' => 'Kata Sandi Baru Tidak Sama!',
            'pw_baru.min' => 'Kata Sandi Baru Kurang Dari 6 Karakter!',
            'konf_pw_baru.min' => 'Konfirmasi Kata Sandi Baru Kurang Dari 6 Karakter!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            if (Hash::check($request->pw_lama, Auth::user()->password)) {
                $data = User::find(Auth::user()->id);
                $data->password = Hash::make($request->pw_baru);
                if($data->save())
                {
                    return response()->json([
                        'fail' => false,
                    ]);
                }
            }else{
                return response()->json([
                    'fail' => true,
                    'errors' => [
                        'pw_lama' => ['Kata Sandi Lama Tidak Sama']
                    ]
                ]);
            }

        }
    }
}
