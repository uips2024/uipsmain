<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Gender;
use App\Models\Status;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Category;
use App\Models\BirthCountry;


use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use DataTables;

class UsersController extends Controller
{

    /**
     * assign roles
     */
    public function __construct()
    {
        $this->middleware('can:view_user',     ['only' => ['index', 'show','ajax']]);
        $this->middleware('can:create_user',   ['only' => ['create', 'store']]);
        $this->middleware('can:edit_user',     ['only' => ['edit', 'updae']]);
        $this->middleware('can:delete_user',   ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.users.index');
    }

    /**
    * get users datatable
    *
    * @access public
    * @var  @Request $request
    */
    public function ajax(Request $request)
    {
        $model=User::query()->with('roles');

        return DataTables::eloquent($model)
        ->addColumn('roles',function($user){
            return view('admin.users._roles',compact('user'));
        })
        ->addColumn('action',function($user){
            return view('admin.users._action',compact('user'));
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
        $roles=Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create new user
        $user=new User;

         $user->email =$request->email;
        $user->first_name=$request->first_name;
        $user->middle_name=$request->middle_name;
        $user->last_name=$request->last_name;
        $user->id_number=$request->id_number;
        $user->user_id =$request->user_id;
        $user->username=$request->username;
        $user->dob=$request->dob;
        $user->gen_id=$request->gen_id;
        $user->nat_id=$request->nat_id;
        $user->birth_id =$request->birth_id;
        $user->rel_id=$request->rel_id;
        $user->cat_id=$request->cat_id;
        $user->lrn=$request->lrn;
        $user->stat_id=$request->stat_id;
        $user->cont_address=$request->cont_address;
        $user->cont_email_address=$request->cont_email_address;
        $user->cont_additional_email_address=$request->cont_additional_email_address;
        $user->parent_name=$request->parent_name;
        $user->parent_phone=$request->parent_phone;
        $user->parent_additional_phone=$request->parent_additional_phone;
        $user->parent_email=$request->parent_email;
        $user->parent_additional_email=$request->parent_additional_email;
        $user->parent_address=$request->parent_address;
        $user->password=bcrypt($request->password);
        $user->password_char=$request->password;
        $user->save();

        //assign roles to user
        if($request->has('roles'))
        {
            foreach($request['roles'] as $role)
            {
                UserRole::firstOrCreate([
                    'user_id'=>$user['id'],
                    'role_id'=>$role
                ]);
                
            }
        }

        session()->flash('success',__('User created successfully'));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::all();

        return view('admin.users.edit',compact('user','roles'));
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
        //update user
        $user=User::findOrFail($id);
        
        $user->email =$request->email;
        $user->first_name=$request->first_name;
        $user->middle_name=$request->middle_name;
        $user->last_name=$request->last_name;
        $user->id_number=$request->id_number;
        $user->user_id =$request->user_id;
        $user->username=$request->username;
        $user->dob=$request->dob;
        $user->gen_id=$request->gen_id;
        $user->nat_id=$request->nat_id;
        $user->birth_id =$request->birth_id;
        $user->rel_id=$request->rel_id;
        $user->cat_id=$request->cat_id;
        $user->lrn=$request->lrn;
        $user->stat_id=$request->stat_id;
        $user->cont_address=$request->cont_address;
        $user->cont_email_address=$request->cont_email_address;
        $user->cont_additional_email_address=$request->cont_additional_email_address;
        $user->parent_name=$request->parent_name;
        $user->parent_phone=$request->parent_phone;
        $user->parent_additional_phone=$request->parent_additional_phone;
        $user->parent_email=$request->parent_email;
        $user->parent_additional_email=$request->parent_additional_email;
        $user->parent_address=$request->parent_address;
      
        //optional updating password
        if(!empty($request['password']))
        {
            $user->password=bcrypt($request->password);
            $user->password_char=$request->password;
        }

        $user->save();

        //assign roles to user
        UserRole::where('user_id',$id)->delete();

        if($request->has('roles'))
        {
            foreach($request['roles'] as $role)
            {
                UserRole::firstOrCreate([
                    'user_id'=>$id,
                    'role_id'=>$role
                ]);

            }
        }

       
        session()->flash('success',__('User updated successfully'));

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findorFail($id);
        
        //delete assigned roles
        UserRole::where('user_id',$id)->delete();

        //delete user finally
        $user->delete();

        session()->flash('success',__('User deleted successfully'));

        return redirect()->route('admin.users.index');
    }
}
