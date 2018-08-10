<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('client.message');
    }
}
