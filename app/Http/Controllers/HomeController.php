<?php

namespace App\Http\Controllers;

use App\Models\Entrydata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function dashboard()
    {
        $datas = Entrydata::all();
        return view('admin',compact('datas'));
    }
}
