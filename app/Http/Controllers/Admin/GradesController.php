<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Http\Requests\Admin\GradeRequest;
use DataTables;

class GradesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_grade',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_grade',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_grade',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_grade',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades=Grade::all();
        return view('admin.grades.index',compact('grades'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Grade::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($grade){
            return view('admin.grades._action',compact('grade'));
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

        return view('admin.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Grade::create($request->except('_token'));
        session()->flash('success','Grade saved successfully');
        return redirect()->route('admin.grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade=Grade::find($id);

        $grade->update(['read'=>true]);

        return view('admin.grades.show',compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade=Grade::findOrFail($id);
        return view('admin.grades.edit',compact('grade'));
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
        $grade=Grade::findOrFail($id);
        $grade->update($request->except('_token','_method'));

        session()->flash('success','Grade updated successfully');
        return redirect()->route('admin.grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade=Grade::findOrFail($id);
        $grade->delete();

        session()->flash('success','Grade deleted successfully');
        return redirect()->route('admin.grades.index');
    }
}
