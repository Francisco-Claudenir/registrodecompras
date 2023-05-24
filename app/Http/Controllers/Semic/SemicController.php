<?php

namespace App\Http\Controllers\Semic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Semic\StoreSemicRequest;
use App\Models\Semic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemicController extends Controller
{
    protected $semic;
    protected $bag = [
        'view' => 'admin.semic',
        'route' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Semic $semic)
    {
        $this->semic = $semic;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programasSemic = $this->semic->paginate(20);
        return view('admin.semic.index', compact('programasSemic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.semic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemicRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->semic->create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
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
