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
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store() {

        Customer::create($this->validateRequest());
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

    //public function show($customer) {
    public function show(Customer $something) {
        //function for showing customers here
        $customer = $something;
        // $customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer) {

        $customer->update($this->validateRequest());

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {
        $customer->delete();

        return redirect('customers');
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'title' => 'required',
            'company_id' => 'required'
        ]);
    }
}
