<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $builder = User::query();
        if ($request->get('search')) {
            $columnToSearch = [
                'name',
                'email',
            ];
            foreach ( $columnToSearch as $col) {
                $builder->orWhere($col, 'like', "%" . $request->get('search') . "%");
            }
        }
        if ($request->get('sortBy')) {
            $order = $request->get('sortBy')[0];
            $builder->orderBy($order['key'], $order['order']);
        }
        $paginator = $builder->paginate($request->get('itemsPerPage', 5));
        return response()->json([
            'items' => $paginator->items(),
            'total' => $paginator->total(),
        ]);
    }

    public function store(Request $request)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed:confirmPassword', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email
        ]);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
