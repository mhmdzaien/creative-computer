<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected function bulanan()
    {
        $results = ServiceRequest::leftJoin('service_progress as p', 'p.id', '=', 'service_request.current_progress_id')
            ->select(
                DB::raw('MONTH(tanggal_masuk) as bulan'),
                DB::raw('COUNT(service_request.id) as jumlah'),
                DB::raw('SUM(IF(p.status_id = 1,1,0)) as selesai'),
            )
            ->groupBy(DB::raw('MONTH(tanggal_masuk)'))
            ->get();
        return $results;
    }

    public function show($id)
    {
        switch($id){
            case 'bulanan':
                return $this->bulanan();
                break;

        }
        return [];
    }
}
