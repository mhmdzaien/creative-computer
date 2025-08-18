<?php

namespace App\Http\Controllers\Api;

use App\Models\ServiceProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'teknisi_id' => 'required|integer',
            'tanggal' => 'required|date',
        ]);

        $serviceProgress = ServiceProgress::create($request->all());

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
