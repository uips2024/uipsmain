<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use DataTables;

class LocationsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_location',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_location',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_location',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_location',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=Location::all();
        return view('admin.locations.index',compact('locations'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Location::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($location){
            return view('admin.locations._action',compact('location'));
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

        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Location::create($request->except('_token'));
        session()->flash('success','Location saved successfully');
        return redirect()->route('admin.locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location=Location::find($id);

        $location->update(['read'=>true]);

        return view('admin.locations.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=Location::findOrFail($id);
        return view('admin.locations.edit',compact('location'));
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
        $location=Location::findOrFail($id);
        $location->update($request->except('_token','_method'));

        session()->flash('success','Location updated successfully');
        return redirect()->route('admin.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location=Location::findOrFail($id);
        $location->delete();

        session()->flash('success','Location deleted successfully');
        return redirect()->route('admin.locations.index');
    }
}
