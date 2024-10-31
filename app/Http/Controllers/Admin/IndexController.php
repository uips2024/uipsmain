<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class IndexController extends Controller
{
    /**
     * admin dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.index');
    }
}
