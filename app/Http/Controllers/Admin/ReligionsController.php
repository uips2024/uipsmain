<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Religion;
use App\Http\Requests\Admin\ReligionRequest;
use DataTables;

class ReligionsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_religion',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_religion',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_religion',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_religion',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $religions=Religion::all();
        return view('admin.religions.index',compact('religions'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Religion::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($religion){
            return view('admin.religions._action',compact('religion'));
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

        return view('admin.religions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReligionRequest $request)
    {
        Religion::create($request->except('_token'));
        session()->flash('success','Religion saved successfully');
        return redirect()->route('admin.religions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $religion=Religion::find($id);

        $religion->update(['read'=>true]);

        return view('admin.religions.show',compact('religion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $religion=Religion::findOrFail($id);
        return view('admin.religions.edit',compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReligionRequest $request, $id)
    {
        $religion=Religion::findOrFail($id);
        $religion->update($request->except('_token','_method'));

        session()->flash('success','Religion updated successfully');
        return redirect()->route('admin.religions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $religion=Religion::findOrFail($id);
        $religion->delete();

        session()->flash('success','Religion deleted successfully');
        return redirect()->route('admin.religions.index');
    }
}
