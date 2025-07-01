<?php

namespace App\Http\Controllers\Announcements;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.announcements.index', [
            'announcements' => Announcement::with('languages')
                ->orderByDesc('created_at')
                ->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uz.title' => 'required|string|max:255',
            'uz.text' => 'required|string',
            'ru.title' => 'required|string|max:255',
            'ru.text' => 'required|string',
            'en.title' => 'required|string|max:255',
            'en.text' => 'required|string',

            'date' => 'required|date',
            'type' => 'required|in:news,announcement',
            'file' => 'required|file|max:2048|mimes:jpg,png,jpeg',
        ],
        [
            'uz.title.required' => 'Uzbek tilida sarlavha kiritilishi shart',
            'uz.text.required' => 'Uzbek tilida matn kiritilishi shart',
            'ru.title.required' => 'Rus tilida sarlavha kiritilishi shart',
            'ru.text.required' => 'Rus tilida matn kiritilishi shart',
            'en.title.required' => 'Ingliz tilida sarlavha kiritilishi shart',
            'en.text.required' => 'Ingliz tilida matn kiritilishi shart',
            'date.required' => 'Sana kiritilishi shart',
            'type.required' => 'E`lon yoki yangilik tanlanishi shart',
            'file.required' => 'Rasm tanlanishi shart',
            'file.max' => 'Rasm hajmi 2MB dan oshmasligi kerak',
            'file.file' => 'Rasm fayl bo`lishi kerak',
            'file.mimes' => 'Rasm JPG, PNG yoki JPEG formatida bo`lishi kerak',
        ]);

        try {
            $announcement = new Announcement();
            $announcement->date = $request->date;
            $announcement->type = $request->type;
            $announcement->save();

            $announcement->languages()->createMany([
                [
                    'lang' => 'uz',
                    'title' => $request->uz['title'],
                    'text' => $request->uz['text'],
                ],
                [
                    'lang' => 'ru',
                    'title' => $request->ru['title'],
                    'text' => $request->ru['text'],
                ],
                [
                    'lang' => 'en',
                    'title' => $request->en['title'],
                    'text' => $request->en['text'],
                ]
            ]);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = Str::random(6) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/files/announcements/', $filename);
                $announcement->files()->create([
                    'filename' => $filename,
                    'path' => url('storage/files/courses/'.$filename),
                ]);
            }
            return redirect()->route('manager.news.index')->with('success', 'E`lon muvaffaqiyatli saqlandi.');
        }catch (Exception $exception){
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('dashboard.announcements.show', [
            'announcement' => $announcement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
