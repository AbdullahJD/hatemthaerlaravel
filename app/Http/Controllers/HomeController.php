<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminTh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $users = User::where(['id'=>1])->get();
//        $user2 = User::find(2);
//        $user3 = User::where('id',1)->first();
//        $user4 = User::where('id',1)->select('name','created_at')->get();
//        return view('home', compact('users','user2','user3'));
        return view('landing.home');
    }

    public function insert (Request $request) {
        // $insert = new AdminTh();
//        $insert->name = "Ahmed";
//        $insert->email = "t@t.t";
//        $insert->save();

        $validator = Validator::make($request->all(),[
           'name' => 'required',
           'email' => 'required',
        ], [
            'name.required' => __('website.name_error'),
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        $insert = AdminTh::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return "Done!!";

    }
//    public function go() {
//        //sdxdgds
//        return view("go');
//    }
}
