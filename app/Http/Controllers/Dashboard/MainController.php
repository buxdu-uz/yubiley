<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function register()
    {
        return view('front.register');
    }

    public function post($type)
    {
        $posts = Announcement::query()
            ->where('type', $type)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('front.post', [
            'posts' => $posts
        ]);
    }
}
