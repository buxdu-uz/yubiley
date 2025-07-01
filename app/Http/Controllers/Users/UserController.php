<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderByDesc('created_at')
            ->paginate(20);
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function storeManager(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'login' => 'required',
            'phone' => 'sometimes',
            'password' => 'required|min:6',
        ],[
            'name.required' => 'Iltimos fioni kiriting',
            'login.required' => 'Iltimos login maydonini to`ldiring',
            'phone.sometimes' => 'Phone is optional',
            'password.required' => 'Iltimos parol kiriting',
            'password.min' => 'Parol kamida 6 ta belgidan iborat bo`lishi kerak',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->login = $request->login;
            $user->phone = $request->phone ?? null;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->assignRole('manager');

            return redirect()->route('admin.users.index')->with(
                'success',
                'Manager muvaffaqiyatli qo\'shildi!');
        }catch (Exception $exception){
            return redirect()->back()->with('error',  $exception->getMessage());
        }
    }
}
