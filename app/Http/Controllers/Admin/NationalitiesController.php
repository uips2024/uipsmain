<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Http\Requests\Admin\NationalityRequest;
use DataTables;

class NationalitiesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_nationality',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_nationality',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_nationality',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_nationality',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities=Nationality::all();
        return view('admin.nationalities.index',compact('nationalities'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Nationality::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($nationality){
            return view('admin.nationalities._action',compact('nationality'));
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

        return view('admin.nationalities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NationalityRequest $request)
    {
        Nationality::create($request->except('_token'));
        session()->flash('success','Nationality saved successfully');
        return redirect()->route('admin.nationalities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nationality=Nationality::find($id);

        $nationality->update(['read'=>true]);

        return view('admin.nationalities.show',compact('nationality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationality=Nationality::findOrFail($id);
        return view('admin.nationalities.edit',compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NationalityRequest $request, $id)
    {
        $nationality=Nationality::findOrFail($id);
        $nationality->update($request->except('_token','_method'));

        session()->flash('success','Nationality updated successfully');
        return redirect()->route('admin.nationalities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationality=Nationality::findOrFail($id);
        $nationality->delete();

        session()->flash('success','Nationality deleted successfully');
        return redirect()->route('admin.nationalities.index');
    }
}
