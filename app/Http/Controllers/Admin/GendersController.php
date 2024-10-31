<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;
use App\Http\Requests\Admin\GenderRequest;
use DataTables;

class GendersController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_gender',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_gender',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_gender',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_gender',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders=Gender::all();
        return view('admin.genders.index',compact('genders'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Gender::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($gender){
            return view('admin.genders._action',compact('gender'));
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

        return view('admin.genders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenderRequest $request)
    {
        Gender::create($request->except('_token'));
        session()->flash('success','Gender saved successfully');
        return redirect()->route('admin.genders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gender=Gender::find($id);

        $gender->update(['read'=>true]);

        return view('admin.genders.show',compact('gender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gender=Gender::findOrFail($id);
        return view('admin.genders.edit',compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenderRequest $request, $id)
    {
        $gender=Gender::findOrFail($id);
        $gender->update($request->except('_token','_method'));

        session()->flash('success','Gender updated successfully');
        return redirect()->route('admin.genders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender=Gender::findOrFail($id);
        $gender->delete();

        session()->flash('success','Gender deleted successfully');
        return redirect()->route('admin.genders.index');
    }
}
