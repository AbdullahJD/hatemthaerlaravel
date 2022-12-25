<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDetail;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
//        $custoemrs = Customer::with('details')->find(4);
//        return $custoemrs->details->phone;
//        $custoemrs = Customer::with('details')->whereHas('details')->get();
//        $custoemrs = Customer::whereHas('details')->get();
//        $custoemrs = Customer::whereDoesntHave('details')->get();
//        $customers = Customer::with('details')->get();
//        $customers = Customer::with(['details' => function($q) {
//            $q->where('code', '970');
//        }])->whereHas('details')->get();

//        $customers = Customer::with('details')->whereHas('details', function($q) {
//            $q->where('code', '970');
//        })->get();
//
//        $customers = Customer::with(['details' => function($q) {
//            $q->select('code','customer_id');
//        }])->whereHas('details')->find(4);

//        $customers->details->makeHidden('customer_id');
//        $customers->details->makeVisible('code');
//        dd($customers);
//        return response()->json($customers);

//        $details = CustomerDetail::with('customer')->find(4);
//        return $details->customer->name;

        $customers = Customer::with('addresses')->find(4);
        foreach ($customers->addresses as $address) {
            return response()->json($address);
        }
        return response()->json($customers);
        return view('customers/index', compact('customers'));
    }
}
