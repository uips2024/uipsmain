<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use App\Models\Language;
use App\Models\Status;
use App\Models\Category;
use App\Models\Religion;
use App\Models\BirthCountry;
use App\Models\Nationality;
use App\Models\Gender;
use Yajra\DataTables\Html\Button;

use DataTables;
use Mail;
use Str;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{

    public function get_status_by_name(Request $request)
    {
        if(isset($request->term))
        {
            $statuses=Status::where('stat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $statuses=Status::All();
        }

        return response()->json($statuses);

    }
/**
 *  * get statuses by desc select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_statuses_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $statuses=Status::where('stat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $statuses=Status::All();
        }

        return response()->json($statuses);

    }
       /**
    * get religion select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_statuses(Request $request)
    {
        if(isset($request->term))
        {
            $statuses=Status::where('stat_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $statuses=Status::All();
        }

        return response()->json($statuses);
    }
/**
 *  * get statuses by desc select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_categories_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $categories=Category::where('cat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $categories=Category::All();
        }

        return response()->json($categories);

    }
       /**
    * get religion select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_categories(Request $request)
    {
        if(isset($request->term))
        {
            $categories=Category::where('cat_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $categories=Category::All();
        }

        return response()->json($categories);
    }



/**
    * get religion by desc select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_religions_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $religions=Religion::where('rel_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $religions=Religion::All();
        }

        return response()->json($religions);

    }
       /**
    * get religion select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_religions(Request $request)
    {
        if(isset($request->term))
        {
            $religions=Religion::where('rel_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $religions=Religion::All();
        }

        return response()->json($religions);
    }





  /**
    * get birthcountries by desc select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_birthcountries_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $birthcountries=BirthCountry::where('birth_name','like','%'.$request->term.'%')->get();
        }
        else{
            $birthcountries=BirthCountry::All();
        }

        return response()->json($birthcountries);

    }
       /**
    * get birthcountries select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_birthcountries(Request $request)
    {
        if(isset($request->term))
        {
            $birthcountries=BirthCountry::where('birth_name','like','%'.$request->term.'%')->get();


        }
        else{
            $birthcountries=BirthCountry::All();
        }

        return response()->json($birthcountries);
    }






      /**
    * get gender by desc select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_gender_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $genders=Gender::where('gen_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $genders=Gender::All();
        }

        return response()->json($genders);

    }
       /**
    * get gender select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_genders(Request $request)
    {
        if(isset($request->term))
        {
            $genders=Gender::where('gen_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $genders=Gender::All();
        }

        return response()->json($genders);
    }
    /**
    * get nationality by code select2
    *
    * @access public
    * @var  @Request $request
    */
       /**
    * get nationality by desc select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_nationality_by_desc(Request $request)
    {
        if(isset($request->term))

        {
            $nationalities=Nationality::where('nat_desc','like','%'.$request->term.'%')->get();
        }
        else{
            $nationalities=Nationality::All();
        }

        return response()->json($nationalities);

    }
       /**
    * get gender select2
    *
    * @access public
    * @var  @Request $request
    */
    public function get_nationalities(Request $request)
    {
        if(isset($request->term))
        {
            $nationalities=Nationality::where('nat_desc','like','%'.$request->term.'%')->get();


        }
        else{
            $nationalities=Nationality::All();
        }

        return response()->json($nationalities);
    }
   
    public function online()
    {
        $online_users=[];

        $users=\App\Models\User::all();

        foreach($users as $user)
        {
            $online=\Cache::get('user-'.$user['id']);
            if(!empty($online))
            {
                array_push($online_users,$user['id']);
            }
        }

        $online_users=\App\Models\User::whereIn('id',$online_users)
                                    ->where('id','!=',auth()->guard('admin')->user()['id'])
                                    ->get();

        return response()->json($online_users);
    }

    /**
    * get chat messages
    *
    * @access public
    * @var  @Request $request
    */
    public function get_chat($id)
    {
        $chats=Chat::with('from_user')->where([
            ['from',$id],['to',auth()->guard('admin')->user()['id']]
        ])->orWhere([
            ['to',$id],['from',auth()->guard('admin')->user()['id']]
        ])->orderBy('id','desc')->take(20)->get();

        $to_chats=Chat::where([['from',$id],['to',auth()->guard('admin')->user()['id']]])->get();

        foreach($to_chats as $chat)
        {
            $chat->update(['read'=>1]);
        }

        return response()->json($chats);
    }

    /**
    * get chat unread messages
    *
    * @access public
    * @var  @Request $request
    */
    public function chat_unread($id)
    {
        $chats=Chat::with('from_user')->where([
            ['from',$id],['to',auth()->guard('admin')->user()['id']]
        ])->where('read',0)
        ->get();

        foreach($chats as $chat)
        {
            $chat->update(['read'=>1]);
        }

        return response()->json($chats);
    }

    /**
    * send message
    *
    * @access public
    * @var  @Request $request
    */
    public function send_message(Request $request,$id)
    {
        $chat=Chat::create([
            'from'=>auth()->guard('admin')->user()['id'],
            'to'=>$id,
            'message'=>$request->message
        ]);

        return $chat;
    }


    /**
    * Change visit status
    *
    * @access public
    * @var  @Request $request
    */
    public function change_visit_status($id)
    {
        $visit=Visit::find($id);
        
        $visit->update([
            'read'=>true,
            'status'=>($visit['status'])?false:true,
        ]);

        return response()->json(__('Visit status updated successfully'));
    }

    /**
    * Change lang status
    *
    * @access public
    * @var  @Request $request
    */
    public function change_lang_status($id)
    {
        $lang=Language::find($id);
        
        $lang->update([
            'active'=>($lang['active'])?false:true,
        ]);

        return response()->json(__('Language status updated successfully'));
    }



    /**
    * get unread mesasges
    * 
    * @access public
    * @var  @Request $request
    */
    public function get_unread_messages(Request $request)
    {
        $messages=Chat::with('from_user')->where('to',auth()->guard('admin')->user()['id'])->where('read',false)->get();
      
        return response()->json($messages);
    }

    /**
    * get unread mesasges count
    * 
    * @access public
    * @var  @Request $request
    */
    public function get_unread_messages_count($user_id)
    {
        $count=Chat::with('from_user')->where([['to',auth()->guard('admin')->user()['id']],['from',$user_id]])->where('read',false)->count();

        return $count;
    }

    /**
    * load more messages
    * 
    * @access public
    * @var  @Request $request
    */
    public function load_more($user_id,$message_id)
    {
        $chats=Chat::with(['from_user','to_user'])->where(function($q)use($user_id){
            return $q->where([
                ['to',$user_id],['from',auth()->guard('admin')->user()['id']]
            ])->orWhere([
                ['from',$user_id],['to',auth()->guard('admin')->user()['id']]
            ]);
        })->where('id','<',$message_id)->orderBy('id','desc')->take(10)->get();

        return response()->json($chats);

    }

    /**
    * get my messages to user 
    * 
    * @access public
    * @var  @Request $request
    */
    public function get_my_messages($id)
    {
        $chats=Chat::where([['from',auth()->guard('admin')->user()['id']],['to',$id]])->orderBy('id','desc')->take(20)->get();

        return response()->json($chats);
    }

   

}



