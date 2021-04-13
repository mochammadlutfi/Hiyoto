<?php

namespace App\Http\Controllers\Umum;

use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;
class ContactController extends Controller
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


        return view('umum.contact');
    }

    public function send(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'category' => 'required',
            'profession' => 'required',
            'subject' => 'required',
            'description' => 'required'
        ];

        $pesan = [
            'id' => [
                'name.required' => 'Nama Lengkap Wajib Diisi!',
                'email.required' => 'Alamat Email Wajib Diisi!',
                'phone.required' => 'No. Telepon Wajib Diisi!',
                'category.required' => 'Kategori Wajib Diisi!',
                'profession.required' => 'Profesi Wajib Diisi!',
                'subject.required' => 'Subjek Wajib Diisi!',
                'description.required' => 'Deskripsi Wajib Diisi!',
            ],
            'en' => [
                'name.required' => 'Full Name Must Be Filled!',
                'email.required' => 'Email Address Must Be Filled!',
                'phone.required' => 'Phone Number Must Be Filled!',
                'category.required' => 'Category Must Be Filled!',
                'profession.required' => 'Profession Must Be Filled!',
                'subject.required' => 'Subject Must Be Filled!',
                'description.required' => 'Description Must Be Filled!',
            ],
        ];

        $validator = Validator::make($request->all(), $rules, $pesan[$request->lang]);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();

            try{
                $data = new Contact();
                $data->name = $request->name;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->category = $request->category;
                $data->profession = $request->profession;
                $data->subject = $request->subject;
                $data->description = $request->description;
               

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


}
