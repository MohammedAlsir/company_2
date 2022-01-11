<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', 1)->count();
        $sections = Section::count();
        $services = Service::count();
        $setting = Setting::select('price_us')->where('id', 1)->first();
        return view('dashboard.index', compact('users', 'sections', 'services', 'setting'));
    }
}