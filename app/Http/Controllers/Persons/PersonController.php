<?php

namespace App\Http\Controllers\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Exception;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::query()
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('dashboard.persons.index',[
            'persons' => $persons,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'login' => 'required|unique:people,login',
            'email' => 'required|email|max:255|unique:people,email',
            'phone' => 'nullable|max:20',
            'password' => 'required|min:6',
            'passport' => 'required|unique:person_profiles,passport',
            'country' => 'required',
            'address' => 'required',
            'place_of_birth' => 'required',
            'organization' => 'required',
            'position' => 'required',
            'activity' => 'required',
            'sex' => 'required|in:male,female',
            'birthday' => 'required|date',
        ],[
            'full_name.required' => 'To‘liq ism-sharif majburiy.',
            'login.required' => 'Login maydoni to‘ldirilishi shart.',
            'login.unique' => 'Bu login allaqachon ishlatilgan.',
            'email.required' => 'Email manzili majburiy.',
            'email.email' => 'Email manzili noto‘g‘ri formatda.',
            'email.max' => 'Email manzili 255 ta belgidan oshmasligi kerak.',
            'email.unique' => 'Bu email allaqachon mavjud.',
            'phone.max' => 'Telefon raqami 20 ta belgidan oshmasligi kerak.',
            'password.required' => 'Parol majburiy.',
            'password.min' => 'Parol kamida 6 ta belgidan iborat bo‘lishi kerak.',
            'passport.required' => 'Pasport maydoni majburiy.',
            'passport.unique' => 'Bu pasport raqami allaqachon mavjud.',
            'country.required' => 'Davlat nomi majburiy.',
            'address.required' => 'Manzil majburiy.',
            'place_of_birth.required' => 'Tug‘ilgan joy majburiy.',
            'organization.required' => 'Tashkilot nomi majburiy.',
            'position.required' => 'Lavozim majburiy.',
            'activity.required' => 'Faoliyat turi majburiy.',
            'sex.required' => 'Jins tanlanishi shart.',
            'sex.in' => 'Jins faqat "male" yoki "female" bo‘lishi mumkin.',
            'birthday.required' => 'Tug‘ilgan sana majburiy.',
            'birthday.date' => 'Tug‘ilgan sana noto‘g‘ri formatda.',
        ]);

        try {
            $person = new Person();
            $person->full_name = $request->input('full_name');
            $person->login = $request->input('login');
            $person->email = $request->input('email');
            $person->phone = $request->input('phone');
            $person->password = bcrypt($request->input('password'));
            $person->save();

            $person->profile()
                ->create([
                    'passport' => $request->input('passport'),
                    'country' => $request->input('country'),
                    'address' => $request->input('address'),
                    'place_of_birth' => $request->input('place_of_birth'),
                    'organization' => $request->input('organization'),
                    'position' => $request->input('position'),
                    'activity' => $request->input('activity'),
                    'sex' => $request->input('sex'),
                    'birthday' => $request->input('birthday'),
                ]);

            $person->assignRole('user');

            return redirect()
                ->back()
                ->with('success', 'Siz muvaffaqiyatli ro`yxatdan o`tingiz.');
        }catch (Exception $exception){
            return redirect()
                ->back()
                ->with('error', $exception->getMessage());
        }
    }
}
