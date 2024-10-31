<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BirthCountry;
use App\Http\Requests\Admin\BirthCountryRequest;
use DataTables;

class BirthCountriesController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_birthcountry',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_birthcountry',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_birthcountry',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_birthcountry',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birthcountries=BirthCountry::all();
        return view('admin.birthcountries.index',compact('birthcountries'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=BirthCountry::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($birthcountry){
            return view('admin.birthcountries._action',compact('birthcountry'));
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

        return view('admin.birthcountries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BirthCountryRequest $request)
    {
        BirthCountry::create($request->except('_token'));
        session()->flash('success','Birth Country saved successfully');
        return redirect()->route('admin.birthcountries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $birthcountry=BirthCountry::find($id);

        $birthcountry->update(['read'=>true]);

        return view('admin.birthcountries.show',compact('birthcountry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $birthcountry=BirthCountry::findOrFail($id);
        return view('admin.birthcountries.edit',compact('birthcountry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BirthCountryRequest $request, $id)
    {
        $birthcountry=BirthCountry::findOrFail($id);
        $birthcountry->update($request->except('_token','_method'));

        session()->flash('success','Birth Country updated successfully');
        return redirect()->route('admin.birthcountries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $birthcountry=BirthCountry::findOrFail($id);
        $birthcountry->delete();

        session()->flash('success','Birth Country deleted successfully');
        return redirect()->route('admin.birthcountries.index');
    }
}
