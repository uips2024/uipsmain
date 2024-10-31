<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Response;
use Illuminate\Validation\Rule;
use Mail;
use Validator;
use Str;

class ApiController extends Controller
{
    public $code='';
    public $message='';
    public $body='';

    public function login(Request $request)
    {
        
       
    }


    public function forget_code(Request $request)
    {
      

    }

    public function register(Request $request)
    {
      

    }

   
}
