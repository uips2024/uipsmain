<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Requests\Admin\StatusRequest;
use DataTables;

class StatusesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_status',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_status',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_status',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_status',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=Status::all();
        return view('admin.statuses.index',compact('status'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Status::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($status){
            return view('admin.statuses._action',compact('status'));
        })
        ->toJson();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        Status::create($request->except('_token'));
        session()->flash('success','Status saved successfully');
        return redirect()->route('admin.statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status=Status::find($id);

        $status->update(['read'=>true]);

        return view('admin.statuses.show',compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status=Status::findOrFail($id);
        return view('admin.statuses.edit',compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        $status=Status::findOrFail($id);
        $status->update($request->except('_token','_method'));

        session()->flash('success','Status updated successfully');
        return redirect()->route('admin.statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status=Status::findOrFail($id);
        $status->delete();

        session()->flash('success','Status deleted successfully');
        return redirect()->route('admin.statuses.index');
    }
}
