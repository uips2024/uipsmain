<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentType;
use DataTables;

class StudentTypesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_studenttype',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_studenttype',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_studenttype',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_studenttype',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studenttypes=StudentType::all();
        return view('admin.studenttypes.index',compact('studenttypes'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=StudentType::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($studenttype){
            return view('admin.studenttypes._action',compact('studenttype'));
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

        return view('admin.studenttypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StudentType::create($request->except('_token'));
        session()->flash('success','Student Type saved successfully');
        return redirect()->route('admin.studenttypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studenttype=StudentType::find($id);

        $studenttype->update(['read'=>true]);

        return view('admin.studenttypes.show',compact('studenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $studenttype=StudentType::findOrFail($id);
        return view('admin.studenttypes.edit',compact('studenttype'));

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
        $studenttype=StudentType::findOrFail($id);
        $studenttype->update($request->except('_token','_method'));

        session()->flash('success','Student Type updated successfully');
        return redirect()->route('admin.studenttypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studenttype=StudentType::findOrFail($id);
        $studenttype->delete();

        session()->flash('success','Student Type deleted successfully');
        return redirect()->route('admin.studenttypes.index');
    }
}
