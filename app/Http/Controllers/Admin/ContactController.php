<?php

namespace App\Http\Controllers\Admin;

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

            $data = Contact::orderBy('created_at', 'DESC')->paginate(10);

            return response()->json($data);
        }
        return view('admin.contact.index');
    }


    public function detail($id)
    {

        $data = Contact::findorfail($id);
        
        return view('admin.contact.detail', compact('data'));

    }


}
