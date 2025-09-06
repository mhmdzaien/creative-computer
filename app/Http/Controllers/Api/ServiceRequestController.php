<?php

namespace App\Http\Controllers\Api;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceProgress;
use App\Models\Setting;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $builder = ServiceRequest::with('currentProgress');
        if ($request->get('search')) {
            $columnToSearch = [
                'nomor',
                'pelanggan',
                'kontak_pelanggan',
                'barang',
                'tanggal_masuk',
                'estimasi_selesai',
                'estimasi_biaya',
                'keluhan',
            ];
            $builder->where(function ($query) use ($columnToSearch, $request) {
                foreach ($columnToSearch as $col) {
                    $query->orWhere($col, 'like', "%" . $request->get('search') . "%");
                }
            });
        }
        if($request->get('me') == 'true'){
            $builder->where('teknisi_id',Auth::user()->id);
        }
        if ($request->get('sortBy')) {
            $order = $request->get('sortBy')[0];
            $builder->orderBy($order['key'], $order['order']);
        }else{
            $builder->orderBy('updated_at','desc');
        }
        $paginator = $builder->paginate($request->get('itemsPerPage', 5));
        $result = ServiceRequest::join('service_progress as s', 's.id', '=', 'service_request.current_progress_id')
            ->select('s.status_id', DB::raw('count(service_request.nomor) as jumlah'))
            ->groupBy('s.status_id');

        if($request->get('me') == 'true'){
            $result = $result->where('service_request.teknisi_id',Auth::user()->id);
        }
        return response()->json([
            'items' => $paginator->items(),
            'total' => $paginator->total(),
            'summary' => $result->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan' => 'required|string|max:255',
            'kontak_pelanggan' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'category_id' => 'required',
            'tanggal_masuk' => 'required|date',
            'estimasi_selesai' => 'required|date',
            'teknisi_id' => 'required|integer',
            'estimasi_biaya' => 'required|numeric',
            'keluhan' => 'required|string',
        ]);


        $serviceRequest = DB::transaction(function () use ($request) {
            $serviceRequest = ServiceRequest::create($request->all([
                'pelanggan',
                'kontak_pelanggan',
                'barang',
                'category_id',
                'tanggal_masuk',
                'estimasi_selesai',
                'teknisi_id',
                'estimasi_biaya',
                'keluhan',
                'jenis_layanan',
                'kelengkapan'
            ]));
            $progress = ServiceProgress::create([
                'service_request_id' => $serviceRequest->id,
                'status_id' => Status::$STATUS_DITERIMA,
                'catatan' => 'Barang telah diterima',
                'teknisi_id' => $serviceRequest->teknisi_id,
                'tanggal' => date('Y-m-d')
            ]);
            ServiceRequest::where(['id' => $serviceRequest->id])->update(['current_progress_id' => $progress->id]);
            return $serviceRequest;
        });

        return response()->json($serviceRequest, 201);
    }

    public function show($id)
    {
        $serviceRequest = ServiceRequest::with(['progress' => function ($q) {
            $q->orderBy('created_at');
        }, 'teknisi', 'category'])->findOrFail($id);
        return response()->json($serviceRequest);
    }

    public function print($id)
    {
        $serviceRequest = ServiceRequest::with(['teknisi', 'category'])->findOrFail($id);
        return view('/nota-service',[
            'serviceRequest'=>$serviceRequest,
            'listKelengkapan'=> Setting::get('kelengkapan'),
            'listLayanan'=> Setting::get('jenis_layanan'),
        ]);
    }

    public function check($id)
    {
        $serviceRequest = ServiceRequest::with(['progress' => function ($q) {
            $q->orderBy('created_at');
        }, 'teknisi', 'category', 'currentProgress'])->where('nomor', $id)->first();
        if ($serviceRequest)
            $serviceRequest->makeHidden(['id', 'progress.id', 'progress.teknisi_id']);
        else
            abort(404);
        return response()->json($serviceRequest);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'pelanggan' => 'required|string|max:255',
            'kontak_pelanggan' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'category_id' => 'required',
            'tanggal_masuk' => 'required|date',
            'estimasi_selesai' => 'required|date',
            'teknisi_id' => 'required|integer',
            'estimasi_biaya' => 'required|numeric',
            'keluhan' => 'required|string',
        ]);

        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->update($request->all());

        return response()->json($serviceRequest);
    }

    public function destroy($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->delete();

        return response()->json(null, 204);
    }
}
