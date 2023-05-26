<?php

namespace App\Http\Controllers;

use App\Models\SubArea;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        return view('home');



        // $users = SubArea::all();
        // return view('home', compact('users'));
    }
    public function indexajax()
    {
        return DataTables::of(SubArea::query())->toJson();
    }
}
