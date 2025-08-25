<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function update(Request $request,$id)
    {
        $request->validate([
            'value' => 'required',
        ]);

        $setting = Setting::set($id,$request->get('value'));
        return response()->json($setting, 201);
    }

    public function show($id)
    {
        $setting = Setting::get($id);
        return response()->json($setting);
    }

}
