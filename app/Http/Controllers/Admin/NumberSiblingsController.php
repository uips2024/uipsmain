<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NumberSibling;

use DataTables;

class NumberSiblingsController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_numbersibling',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_numbersibling',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_numbersibling',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_numbersibling',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numbersiblings=NumberSibling::all();
        return view('admin.numbersiblings.index',compact('numbersiblings'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=NumberSibling::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($numbersibling){
            return view('admin.numbersiblings._action',compact('numbersibling'));
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

        return view('admin.numbersiblings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberSibling::create($request->except('_token'));
        session()->flash('success','Number of Sibling saved successfully');
        return redirect()->route('admin.numbersiblings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $numbersibling=NumberSibling::find($id);

        $numbersibling->update(['read'=>true]);

        return view('admin.numbersiblings.show',compact('numbersibling'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $numbersibling=NumberSibling::findOrFail($id);
        return view('admin.numbersiblings.edit',compact('numbersibling'));
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
        $numbersibling=NumberSibling::findOrFail($id);
        $numbersibling->update($request->except('_token','_method'));

        session()->flash('success','Number of Sibling updated successfully');
        return redirect()->route('admin.numbersiblings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $numbersibling=NumberSibling::findOrFail($id);
        $numbersibling->delete();

        session()->flash('success','Number of Sibling deleted successfully');
        return redirect()->route('admin.numbersiblings.index');
    }
}
