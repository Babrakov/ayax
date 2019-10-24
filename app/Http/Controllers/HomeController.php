<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Places;
use App\Districts;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = Districts::all();
        $places = Places::with("districts")->get();
        return view('welcome',compact('districts','places'));
    }
    
}
