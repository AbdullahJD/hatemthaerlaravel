<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerDetail;
use App\Models\Job;
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

    public function getCustomers() {
        $customers = Customer::with('details')->get();
        return view('customers/show', compact('customers'));
    }

    public function getCustomerAddresses ($id) {
        $customer = Customer::find($id);
        $addresses = $customer->addresses;
        return view('customers/addresses', compact('addresses'));
    }

    public function getCustomerJobs() {
        $customer = Customer::find(4);
        $customer_jobs = $customer->jobs;
        return response()->json($customer_jobs);
    }

    public function getJobCustomers() {
        $job = Job::with('customers')->find(1);
        return response()->json($job);
    }

    public function insertCustomerJobs () {
        $data= [];
        $data['customers'] = Customer::get();
        $data['jobs'] = Job::get();
        return view('insertCustomerJobs',compact('data'));
    }

    public function insertCustomerJobsPost (Request $request) {
       $customer = Customer::find($request->customer);
//       $insert = $customer->jobs()->attach($request->jobs);
        $insert = $customer->jobs()->sync($request->jobs);
//        $insert = $customer->jobs()->syncWithoutDetaching($request->jobs);
        return "ok";
    }
}
