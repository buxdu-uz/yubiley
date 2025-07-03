<?php

namespace App\Http\Controllers\Congratulations;

use App\Http\Controllers\Controller;
use App\Models\Congratulation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongratulationController extends Controller
{
    public function index()
    {
        $query = Congratulation::query();

        if (Auth::guard('person')->check()) {
            $query->where('person_id', Auth::guard('person')->id());
        }

        $congratulations = $query->paginate(20);

        return view('dashboard.congratulations.index', [
            'congratulations' => $congratulations
        ]);
    }

    public function create()
    {
        return view('dashboard.congratulations.create');
    }

    public function show(Congratulation $congratulation)
    {
        return view('dashboard.congratulations.show',[
            'congratulation' => $congratulation
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ],
            [
                'title.required' => 'Sarlavha kiritilishi shart',
                'text.required' => 'Matn kiritilishi shart'
            ]);

        try {
            $congratulation = new Congratulation();
            $congratulation->person_id = Auth::guard('person')->id();
            $congratulation->title = $request->title;
            $congratulation->text = $request->text;
            $congratulation->save();

            return redirect()->route('congratulations.index')->with('success', 'Tabrik muvaffaqiyatli yuborildi.');
        }catch (Exception $exception){
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
