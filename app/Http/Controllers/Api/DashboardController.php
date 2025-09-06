<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceProgress;
use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;
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

    protected function category()
    {
        $results = ServiceRequest::select(DB::raw('ANY_VALUE(category.category) as category'), DB::raw('COUNT(service_request.id) as jumlah'))
            ->join('category', 'category.id', '=', 'service_request.category_id')
            ->whereYear('service_request.tanggal_masuk', '=', DB::raw('YEAR(NOW())'))
            ->groupBy('category.id')
            ->get();
        return $results;
    }

    protected function teknisi(Request $request)
    {
        $results = User::select(
            DB::raw('ANY_VALUE(users.name) as name'),
            DB::raw('COALESCE(COUNT(service_request.id), 0) as jumlah'),
            DB::raw('SUM(CASE WHEN service_progress.status_id = 1 THEN 1 ELSE 0 END) as selesai')
        )
            ->leftJoin('service_request', function ($join) use ($request) {
                $join->on('users.id', '=', 'service_request.teknisi_id')
                    ->on('tanggal_masuk', '>=', DB::raw("'".$request->get('start') . " 00:00:00'"))
                    ->on('tanggal_masuk', '<=', DB::raw("'".$request->get('end') . " 23:59:59'"));
            })
            ->leftJoin('service_progress', 'service_progress.id', '=', 'service_request.current_progress_id')
            ->groupBy('users.id')
            ->get();
        return $results;
    }

    protected function lastActivity()
    {
        $results = $results = ServiceProgress::select(
            'service_progress.service_request_id',
            'users.name',
            'status.status',
            'service_progress.catatan',
            'service_progress.created_at as createdAt',
            'service_request.barang',
            'service_request.pelanggan'
        )
            ->join('service_request', 'service_request.id', '=', 'service_progress.service_request_id')
            ->join('users', 'users.id', '=', 'service_progress.teknisi_id')
            ->join('status', 'status.id', '=', 'service_progress.status_id')
            ->orderBy('service_progress.created_at', 'desc')
            ->limit(5)
            ->get();
        return $results;
    }

    public function show(Request $request, $id)
    {
        switch ($id) {
            case 'bulanan':
                return $this->bulanan();
                break;
            case 'kategori':
                return $this->category();
                break;
            case "teknisi":
                return $this->teknisi($request);
                break;
            case 'last-activity':
                return $this->lastActivity();
                break;
        }
        return [];
    }
}
