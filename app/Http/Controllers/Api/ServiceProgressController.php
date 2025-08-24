<?php

namespace App\Http\Controllers\Api;

use App\Models\ServiceProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;

class ServiceProgressController extends Controller
{
    public function index()
    {
        return response()->json(ServiceProgress::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_request_id' => 'required|uuid',
            'status_id' => 'required|integer',
            'catatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);
        $serviceProgress = DB::transaction(function () use ($request) {
            $serviceProgress = ServiceProgress::create([
                'service_request_id' => $request->service_request_id,
                'status_id' => $request->status_id,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
                'teknisi_id' => auth()->user()->id,
            ]);
            ServiceRequest::where(['id'=>$request->service_request_id])->update(['current_progress_id'=>$serviceProgress->id]);
            return $serviceProgress;
        });
        return response()->json($serviceProgress, 201);
    }

    public function show($id)
    {
        $serviceProgress = ServiceProgress::findOrFail($id);
        return response()->json($serviceProgress);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_request_id' => 'required|uuid',
            'status_id' => 'required|integer',
            'catatan' => 'required|string|max:255',
            'teknisi_id' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $serviceProgress = ServiceProgress::findOrFail($id);
        $serviceProgress->update($request->all());

        return response()->json($serviceProgress);
    }

    public function destroy($id)
    {
        $serviceProgress = ServiceProgress::findOrFail($id);
        $serviceProgress->delete();

        return response()->json(null, 204);
    }
}
