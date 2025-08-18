<?php

namespace App\Http\Controllers\Api;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json(Status::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Status::create($request->all());

        return response()->json($status, 201);
    }

    public function show($id)
    {
        $status = Status::findOrFail($id);
        return response()->json($status);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $status = Status::findOrFail($id);
        $status->update($request->all());

        return response()->json($status);
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return response()->json(null, 204);
    }
}
