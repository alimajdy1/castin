<?php

namespace App\Http\Controllers\Model;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index(){
        return view('model.job');
    }

}
