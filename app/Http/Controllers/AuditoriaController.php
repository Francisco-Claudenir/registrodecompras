<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    protected $auditoria;
    protected $bag = [
        'view' => 'admin.auditoria',
        'route' => 'auditoria',
        'Title' => 'Auditoria',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Auditoria $auditoria)
    {
        $this->auditoria = $auditoria;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auditoria = $this->auditoria->get();
        $auditoriaCreated = $this->auditoria->where('event', '=', 'CREATED')->get();
        $auditoriaUpdated = $this->auditoria->where('event', '=', 'UPDATED')->get();
        $auditoriaDeleted = $this->auditoria->where('event', '=', 'DELETED')->get();

        return view($this->bag['view'] . '.index', compact('auditoria', 'auditoriaCreated', 'auditoriaUpdated', 'auditoriaDeleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
