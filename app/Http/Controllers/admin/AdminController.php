<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function  index(){
        $data['route'] = 'dashboard';
        return view('admin.dashboard',$data);
    }
}
