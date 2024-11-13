<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MotherLanguage;

use DataTables;

class MotherLanguagesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_motherlanguage',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_motherlanguage',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_motherlanguage',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_motherlanguage',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motherlanguages=MotherLanguage::all();
        return view('admin.motherlanguages.index',compact('motherlanguages'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=MotherLanguage::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($motherlanguage){
            return view('admin.motherlanguages._action',compact('motherlanguage'));
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

        return view('admin.motherlanguages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MotherLanguage::create($request->except('_token'));
        session()->flash('success','Mother Language saved successfully');
        return redirect()->route('admin.motherlanguages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motherlanguage=MotherLanguage::find($id);

        $motherlanguage->update(['read'=>true]);

        return view('admin.motherlanguages.show',compact('motherlanguages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motherlanguage=MotherLanguage::findOrFail($id);
        return view('admin.motherlanguages.edit',compact('motherlanguage'));
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
        $motherlanguage=MotherLanguage::findOrFail($id);
        $motherlanguage->update($request->except('_token','_method'));

        session()->flash('success','Mother Language updated successfully');
        return redirect()->route('admin.motherlanguages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motherlanguage=MotherLanguage::findOrFail($id);
        $motherlanguage->delete();

        session()->flash('success','Mother Language deleted successfully');
        return redirect()->route('admin.motherlanguages.index');
    }
}
