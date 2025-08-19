<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $paginator = User::paginate($request->get('itemsPerPage', 5));
        return response()->json([
            'items' => $paginator->items(),
            'total' => $paginator->total(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $category = User::create($request->all());

        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = User::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $category = User::findOrFail($id);
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = User::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }
}
