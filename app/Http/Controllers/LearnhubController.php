<?php

namespace app\Http\Controllers;

use App\LearnHub;
use App\Http\Controllers\Controller;
use DB;

class LearnhubController extends Controller
{
    public function index()
    {
        $courses = LearnHub::all();
        $res = DB::table('LearnHub')
                    ->select('category')->groupBy('category')->get();
        $categories = json_decode(json_encode($res), true);

        return view('welcome', ['courses' => $courses, 'categories' => $categories]);
    }

    public function data()
    {
        $courses = LearnHub::all();
        $res = DB::table('LearnHub')
                    ->select('category')->groupBy('category')->get();
        $categories = json_encode($res);

        return json_encode([$courses, $res]);
    }
}
