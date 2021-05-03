<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use DB;
use App;
use CodeDredd\Soap\Facades\Soap;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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
        $url = "https://dearhc.hiyoto.com/ehc/Services/WebServiceRecruitment.asmx?WSDL";
        $response = Soap::baseWsdl($url)->withOptions([
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ]);

        $data_lowongan = json_decode($response->call('DataLowongan')['DataLowonganResult']);
        // array_multisort(array_column($page_data['data_lowongan'], 'jabatan'), SORT_ASC, $page_data['data_lowongan']);
        // $page_data['total_jobs'] = count($page_data['data_lowongan']);
        // $page_data['jobdesc'] = array();
        // // var_dump($page_data['data_lowongan']);
        // if (count($page_data['data_lowongan']))
        // {
        //     foreach ($page_data['data_lowongan'] as $job) {
        //         // $j = 
        //         $page_data['jobdesc'][$job->id_lowongan] = json_decode($response->call('OpenJobTugas', ['param' => $job->id_lowongan])['OpenJobTugasResult'], true);
        //         $page_data['data_requirement'][$job->id_lowongan] = json_decode($response->call('OpenJobPendidikan', ['param' => $job->id_lowongan])['OpenJobPendidikanResult'], true);
        //     }
        // }
        // dd($this->paginate($data));
    // dd($data);
        $data = Collect([]);
        $data->pusat = [];
        $data->cabang = [];
        foreach($data_lowongan as $job)
        {
            if($job->bagian === "Pusat"){
                $data->pusat[] = $job;
            }else{
                $data->cabang[] = $job;
            }
        }
        return view('umum.career.index', compact('data'));
    }

    public function getData()
    {
        $url = "https://dearhc.hiyoto.com/ehc/Services/WebServiceRecruitment.asmx?WSDL";
        $response = Soap::baseWsdl($url)->withOptions([
            'trace' => true,
            'exceptions' => true,
            'cache_wsdl' => WSDL_CACHE_NONE,
        ]);

        $data_lowongan = json_decode($response->call('DataLowongan')['DataLowonganResult']);
            dd($data_lowongan);
        $page_data['data_lowongan'] = json_decode($response->call('DataLowongan')['DataLowonganResult']);
        array_multisort(array_column($page_data['data_lowongan'], 'jabatan'), SORT_ASC, $page_data['data_lowongan']);
        $page_data['total_jobs'] = count($page_data['data_lowongan']);
        $page_data['jobdesc'] = array();
        // var_dump($page_data['data_lowongan']);
        if (count($page_data['data_lowongan']))
        {
            foreach ($page_data['data_lowongan'] as $job) {
                // $j = 
                $page_data['jobdesc'][$job->id_lowongan] = json_decode($response->call('OpenJobTugas', ['param' => $job->id_lowongan])['OpenJobTugasResult'], true);
                $page_data['data_requirement'][$job->id_lowongan] = json_decode($response->call('OpenJobPendidikan', ['param' => $job->id_lowongan])['OpenJobPendidikanResult'], true);
            }
        }
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $data = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($data->forPage($page, $perPage), $data->count(), $perPage, $page, $options);
    }
}
