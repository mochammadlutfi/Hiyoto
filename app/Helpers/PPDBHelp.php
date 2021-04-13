<?php
use Carbon\Carbon;
use App\Models\PPDB;
if (!function_exists('get_kd_register')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_kd_register()
    {
        $q = PPDB::select(DB::raw('MAX(RIGHT(kd_registrasi,4)) AS kd_max'));
        if($q->count() > 0){
            foreach($q->get() as $k){
                return Carbon::now()->format('Ymd').sprintf("%04s", abs(((int)$k->kd_max) + 1));
            }
        }else{
            return Carbon::now()->format('Ymd').sprintf("%04s", 1);
        }
    }
}

if (!function_exists('get_status_kunjungan')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_status_kunjungan($status)
    {
        if(auth()->guard('admin')->check())
        {
            if($status == 'diproses')
            {
                $re = '<div class="badge badge-warning float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }else if($status == 'disetujui' ||  $status == 'kabag')
            {
                $re = '<div class="badge badge-success float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }else if($status == 'ditolak')
            {
                $re = '<div class="badge badge-danger float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }if($status == 'selesai')
            {
                $re = '<div class="badge badge-primary float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }
        }

        return $re;
    }
}

if (!function_exists('kunjungan_status')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function kunjungan_status($status)
    {
        if(auth()->guard('web')->check())
        {
            if($status == 'diproses' ||  $status == 'kabag')
            {
                $re = '<div class="badge badge-warning float-lg-left float-right font-size-14-down-lg font-size-20 py-2">Diproses</div>';
            }else if($status == 'disetujui')
            {
                $re = '<div class="badge badge-success float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }else if($status == 'ditolak')
            {
                $re = '<div class="badge badge-danger float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }if($status == 'selesai')
            {
                $re = '<div class="badge badge-primary float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }
        }

        return $re;
    }
}

if (!function_exists('getPengajuanCount')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function getPengajuanCount()
    {
        $user = auth()->guard('admin')->user();

        if($user->hasRole('kabag'))
        {
            $count = Kunjungan::where('status', 'diproses')->get()->count();
            return '<span class="badge badge-pill badge-primary ml-5">'.$count.'</span>';

        }else if($user->hasRole('sekwan'))
        {
            $count = Kunjungan::where('status', 'kabag')->get()->count();
            return '<span class="badge badge-pill badge-primary ml-5">'.$count.'</span>';
        }

        return false;
    }
}
