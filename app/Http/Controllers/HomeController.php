<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminTh;
use App\Models\Customer;
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
        $customers = Customer::get();
        return view('landing.home');
    }

    public function  formData () {
        return view('form');
    }

    public function sendData(Request $request) {

//        $insertData = new Customer();
//        $insertData->name = "ahned";
//        $insertData->comment = "ahned";
//        $insertData->is_active = 1;
//        $insertData->price = 1.2;
//        $insertData->save();
        $erors_validation = [
            'name' => 'required|unique:customers,name',
            'comment' => 'required',
            'is_active' => 'required',
            'price' => 'required|numeric|max:5',
        ];
        $messages = $this->messages();
        $validator = Validator::make($request->all(),$erors_validation,$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
//            return $validator->errors()->first();

        }


        $insertData = Customer::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'is_active' => $request->is_active,
            'price' => $request->price,
        ]);

        return redirect()->back()->with(['success' => 'it\'s Done']);
    }

    public function messages() {
        return [
            'name.required' => trans('website.nameRequired'),
            'name.unique' => 'الاسم متكرر',
        ];
    }

    public function insert (Request $request) {

        // $insert = new AdminTh();
//        $insert->name = "Ahmed";
//        $insert->email = "t@t.t";
//        $insert->save();

//        $validator = Validator::make($request->all(),[
//           'name' => 'required',
//           'email' => 'required',
//        ], [
//            'name.required' => __('website.name_error'),
//        ]);
//
//        if ($validator->fails()) {
//            return $validator->errors()->first();
//        }
//
//        $insert = AdminTh::create([
//            'name' => $request->name,
//            'email' => $request->email,
//        ]);
//
//        return "Done!!";

    }
//    public function go() {
//        //sdxdgds
//        return view("go');
//    }
}
