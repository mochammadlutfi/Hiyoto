<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use App;

class ProjectController extends Controller
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

        $contact = array(
            array(
                'id' => 1,
                'nama' => 'RH PAINT ALAM SUTERA',
                'alamat' => 'Ruko Imperial Walk Kav. 29 C No. 42,
                Jl. Jalur Sutera, Alam Sutera, Tangerang – 15320',
                'telp' => '021-30448589',
                'fax' => '021-30448539',
                'email1' => 'ralston.sby@hiyoto.com',
                'email2' => '',
                'hunting_nama' => 'Yanita',
                'hunting_phone1' => '081317721097',
                'hunting_phone2' => '',
            ),
            array(
                'id' => 2,
                'nama' => 'RH PAINT BANDUNG',
                'alamat' => 'Komp. Ruko Suniaraja No. 65 PQ,
                Sumur Bandung, Bandung – 40111',
                'telp' => '022-4222598 ',
                'fax' => '022-4234103',
                'email1' => 'ralston@hiyoto.com',
                'email2' => 'ralston.bdg@hiyotopaint.com',
                'hunting_nama' => 'Ferry',
                'hunting_phone1' => '081317721097',
                'hunting_phone2' => '',
            ),
            array(
                'id' => 3,
                'nama' => 'RH PAINT BALI',
                'alamat' => 'Ruko Imperial Walk Kav. 29 C No. 42,
                Jl. Jalur Sutera, Alam Sutera, Tangerang – 15320',
                'telp' => '021-30448589 ',
                'fax' => '021-30448539',
                'email1' => 'rhpaint.bali@hiyoto.com',
                'email2' => '',
                'hunting_nama' => 'Arko',
                'hunting_phone1' => '085792471776',
                'hunting_phone2' => '082247301292',
            ),
            array(
                'id' => 4,
                'nama' => 'RH PAINT SURABAYA',
                'alamat' => 'Komp. Ruko Rich Palace Blok C-3,
                Jl. Mayjend Sungkono 151, Dukuh Pakis,
                Surabaya – 60225',
                'telp' => '031-5660510',
                'fax' => '031-5660513',
                'email1' => 'ralston.sby@hiyoto.com',
                'email2' => '',
                'hunting_nama' => 'Dedy',
                'hunting_phone1' => '081310351937',
                'hunting_phone2' => '',
            ),
        );

        return view('umum.project.index', compact('contact'));
    }


}
