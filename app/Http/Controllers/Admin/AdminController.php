<?php

namespace App\Http\Controllers\Admin;

use App\Models\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
       $speakers = Speaker::all();
        $total = ['10', '20'];
       return view('admin.index', compact('total'));
    }
}
