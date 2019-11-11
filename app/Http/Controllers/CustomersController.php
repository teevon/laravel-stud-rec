<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function index() {
        $customers = Customer::all();
        //Alternate method of listing customers
        /* $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::where('active', 0)->get();

        return view('customers.index', [
            'active_customers' => $activeCustomers,
            'inactive_customers' => $inactiveCustomers
        ]);
        */
        //alternate way of passing values with same name for key and values
        // return view('customers.index', ['activeCustomers', inactiveCustomers, companies]);
        //compact works only if 'active_customers' is replaced with 'activeCustomer'
        // same for 'all other key-value pairs'
        return view('customers.index', compact('customers'));
    }

    public function create() {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'title' => 'required',
            'active' => 'required',
            'company_id' => 'required'
        ]);

        Customer::create($data);
        /* //cumbersome method of creating customer
        $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->title = request('title');
        $customer->active = request('active');
        $customer->save();
        */

        //return back();
        return redirect("customers");
    }

    public function show($customer) {
        //function for showing customers here
    }
}
