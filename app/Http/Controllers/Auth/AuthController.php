<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        if (Auth::check()) {
            return redirect()->route('main');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $messages = [
                'login.required' => 'Iltimos loginni kiriting!',
                'login.exists' => 'Bunday login bazada topilmadi!',
                'password.required' => 'Iltimos parolni kiriting',
                'guard.required' => 'Iltimos tizimga kirish uchun roli tanlang!',
                'guard.in' => 'Iltimos tizimga kirish uchun roli tanlang: Xodim yoki Foydalanuvchi!',
            ];

            // Validatsiya
            $request->validate([
                'login' => 'required',
                'password' => 'required|string',
                'guard' => 'required|in:employee,user',
            ], $messages);
            switch ($request->guard) {
                case 'employee':
                    Auth::shouldUse('web');
                    break;
                case 'user':
                    Auth::shouldUse('person');
                    break;
            }

            if (!Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
                return redirect()
                    ->route('auth.login-page')
                    ->withErrors(['login' => 'Login yoki parol xato!'])
                    ->withInput();
            }
//            dd(Auth::user());
            return redirect()->route('dashboard');
        } catch (Exception $exception) {
            dd($exception);
            return redirect()
                ->back()
                ->with('message', $exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        if (auth()->check()) {
            auth()->logout(); // Foydalanuvchini chiqish
            $request->session()->invalidate(); // Sessiyani bekor qilish
            $request->session()->regenerateToken(); // CSRF tokenni yangilash
        }

        return redirect()->route('main');
    }
}
