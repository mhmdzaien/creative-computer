<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:255',
            'value' => 'required',
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return response()->json($setting);
    }

}
