<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mode;
use DataTables;

class ModesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_mode',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_mode',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_mode',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_mode',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modes=Mode::all();
        return view('admin.modes.index',compact('modes'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Mode::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($mode){
            return view('admin.modes._action',compact('mode'));
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

        return view('admin.modes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mode::create($request->except('_token'));
        session()->flash('success','Mode saved successfully');
        return redirect()->route('admin.modes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mode=Mode::find($id);

        $mode->update(['read'=>true]);

        return view('admin.modes.show',compact('mode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mode=Mode::findOrFail($id);
        return view('admin.modes.edit',compact('mode'));
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
        $mode=Mode::findOrFail($id);
        $mode->update($request->except('_token','_method'));

        session()->flash('success','Mode updated successfully');
        return redirect()->route('admin.modes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mode=Mode::findOrFail($id);
        $mode->delete();

        session()->flash('success','Mode deleted successfully');
        return redirect()->route('admin.modes.index');
    }
}
