<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\User;
use App\Models\Gender;
use App\Models\Status;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Category;
use App\Models\BirthCountry;

class ProfileController extends Controller
{
    /**
     * Show the form for editing profile
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

         $user=User::findOrFail(auth()->guard('admin')->user()->id);
      
        
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //update user
        $user=User::findOrFail(auth()->guard('admin')->user()->id);

        
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
            $user->password_char=$request->password_char;
            
        }

        //signature
        // if($request->hasFile('signature')) {
        //     $signature = $request->file('signature');
        //     $orig_signature = $signature->getClientOriginalName();
        //     $user->signature_data = file_get_contents($signature->getRealPath());
        //     $signature_name = auth()->guard('admin')->user()->id.'.'.$signature->getClientOriginalExtension();
        //     $signature->move('uploads/signature', $signature_name);
        //     $user->signature = $signature_name;
        // }
          //pic
        //   if($request->hasFile('pic_emp')) {
        //     $pic_emp = $request->file('pic_emp');
        //     $orig_pic_emp = $pic_emp->getClientOriginalName();
        //     $user->pic_emp_data = file_get_contents($pic_emp->getRealPath());
        //     $pic_emp_name = auth()->guard('admin')->user()->emp_id.'.'.$pic_emp->getClientOriginalExtension();
        //     $pic_emp->move('uploads/signature', $pic_emp_name);
        //     $user->pic_emp = $pic_emp_name;
        // }
        
        $user->save();

        session()->flash('success',__('Profile updated successfully'));

        return redirect()->route('admin.profile.edit');
        
    }    
}
