<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\Admin\ReservationRequest;
use DataTables;
use App\Models\Gender;
use App\Models\Mode;
use App\Models\Location;
use App\Models\Nationality;
use App\Models\Curriculum;
use App\Models\Grade;
use App\Models\StudentType;
use App\Models\NumberSibling;

class ReservationController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_reservation',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_reservation',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_reservation',     ['only' => ['edit', 'update']]);
        $this->middleware('can:delete_reservation',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $reservations=Reservation::get();
         $reservations = \DB::table('reservation')->orderBy('id','desc')->get();
        return view('admin.reservations.index',compact('reservations'));
    }
    /**
    * get division datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=Reservation::query();

        return DataTables::eloquent($model)
        ->addColumn('action',function($reservation){
            return view('admin.reservations._action',compact('reservation'));
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

        return view('admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('action') == 'proceed')
        {
          
        $reservation=new Reservation;

            $reservation->type=$request->stud_type_id;
            $reservation->gradelevel=$request->grd_id;
            $reservation->is_proceed=1;


            $reservation->save();

            session()->flash('success','Reservation proceeded successfully');
        }
        elseif($request->get('action') == 'save')
        {
        }

        return redirect()->route('admin.reservations.edit',[$reservation->id]);

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation=Reservation::find($id);

        $reservation->update(['read'=>true]);

        return view('admin.reservations.show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $reservation=Reservation::findOrFail($id);
       
        return view('admin.reservations.edit',compact('reservation'));
        

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
        $reservation=Reservation::findOrFail($id);
        $reservation->update($request->except('_token','_method'));

        session()->flash('success','Reservation updated successfully');
        return redirect()->route('admin.reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->delete();

        session()->flash('success','Reservation deleted successfully');
        return redirect()->route('admin.reservations.index');
    }
}
