<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Http\Requests\Admin\CurriculumRequest;
use DataTables;

class CurriculumsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_curriculum',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_curriculum',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_curriculum',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_curriculum',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums=Curriculum::all();
        return view('admin.curriculums.index',compact('curriculums'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Curriculum::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($curriculum){
            return view('admin.curriculums._action',compact('curriculum'));
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

        return view('admin.curriculums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Curriculum::create($request->except('_token'));
        session()->flash('success','Curriculum saved successfully');
        return redirect()->route('admin.curriculums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curriculums=Curriculum::find($id);

        $curriculums->update(['read'=>true]);

        return view('admin.curriculums.show',compact('curriculum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curriculum=Curriculum::findOrFail($id);
        return view('admin.curriculums.edit',compact('curriculum'));
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
        $curriculum=Curriculum::findOrFail($id);
        $curriculum->update($request->except('_token','_method'));

        session()->flash('success','Curriculum updated successfully');
        return redirect()->route('admin.curriculums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum=Curriculum::findOrFail($id);
        $curriculum->delete();

        session()->flash('success','Curriculum deleted successfully');
        return redirect()->route('admin.curriculums.index');
    }
}
