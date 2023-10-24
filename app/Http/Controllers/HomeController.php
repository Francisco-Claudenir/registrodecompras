<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\SubArea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $users = User::count();
        $usersSemanais = User::select(
            DB::raw('EXTRACT(YEAR FROM created_at) as year'),
            DB::raw('EXTRACT(WEEK FROM created_at) as week'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('year', 'week')
            ->first();
        return view('home', compact('users','usersSemanais'));
    }
    public function indexajax()
    {
        return DataTables::of(Curso::query())->toJson();
    }
}
