<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemicRequest;
use App\Models\Semic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemicController extends Controller
{
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemicRequest $request)
    {
        DB::beginTransaction();

        try {

            Semic::create($request->validated());
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semic  $semic
     * @return \Illuminate\Http\Response
     */
    public function show(Semic $semic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semic  $semic
     * @return \Illuminate\Http\Response
     */
    public function edit(Semic $semic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semic  $semic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semic $semic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semic  $semic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semic $semic)
    {
        //
    }
}
