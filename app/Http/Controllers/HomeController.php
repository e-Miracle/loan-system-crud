<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use App\Repositories\PropertiesRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::id() == 1){
            $loans = new PropertiesRepository(new Properties());
            $loans = $loans->all();
            return view('admin', compact('loans'));
        }else{
            $loans = Auth::user()->loans()->get();
            return view('home', compact('loans'));
        }
    }
}
