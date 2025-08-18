<?php

namespace App\Http\Controllers\Api;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceRequestController extends Controller
{
    public function index()
    {
        return response()->json(ServiceRequest::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'pelanggan' => 'required|string|max:255',
            'kontak_pelanggan' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'category_id' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'estimasi_selesai' => 'required|date',
            'teknisi_id' => 'required|integer',
            'estimasi_biaya' => 'required|numeric',
            'keluhan' => 'required|string',
            'progress_id' => 'required|integer',
        ]);

        $serviceRequest = ServiceRequest::create($request->all());

        return response()->json($serviceRequest, 201);
    }

    public function show($id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        return response()->json($serviceRequest);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'pelanggan' => 'required|string|max:255',
            'kontak_pelanggan' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'category_id' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'estimasi_selesai' => 'required|date',
            'teknisi_id' => 'required|integer',
            'estimasi_biaya' => 'required|numeric',
            'keluhan' => 'required|string',
            'progress_id' => 'required|integer',
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
