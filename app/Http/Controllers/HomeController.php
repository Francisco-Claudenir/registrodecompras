<?php

namespace App\Http\Controllers;

use App\Models\SubArea;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{

    public function __construct()
    {
    }


    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('home');
    }
    public function indexajax()
    {
        return DataTables::of(SubArea::query())->toJson();
    }
}
