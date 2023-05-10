<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrandeArea\StoreGrandeAreaRequest;
use App\Http\Requests\GrandeArea\UpdateGrandeAreaRequest;
use App\Models\GrandeArea;
use Illuminate\Support\Facades\DB;

class GrandeAreaController extends Controller
{
    protected $grandearea;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(GrandeArea $grandearea)
    {
        $this->grandearea = $grandearea;
    }

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
        return view('admin.grandearea.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GrandeArea\StoreGrandeAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrandeAreaRequest $request)
    {
        DB::beginTransaction();

        try {

            //$request->validated()
           $this->grandearea->create($request->validated());
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
     * @param  \App\Models\GrandeArea  $grandeArea
     * @return \Illuminate\Http\Response
     */
    public function show(GrandeArea $grandeArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrandeArea  $grandeArea
     * @return \Illuminate\Http\Response
     */
    public function edit(GrandeArea $grandeArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GrandeArea\UpdateGrandeAreaRequest  $request
     * @param  \App\Models\GrandeArea  $grandeArea
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGrandeAreaRequest $request, GrandeArea $grandeArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrandeArea\GrandeArea  $grandeArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrandeArea $grandeArea)
    {
        //
    }
}
