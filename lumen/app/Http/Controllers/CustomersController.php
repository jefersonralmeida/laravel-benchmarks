<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Customer::paginate();
    }

    public function view(int $customerId)
    {
        // first find the model (or throw a Not found http exception, that returns a 404 as response)
        $customer = Customer::findOrFail($customerId);

        // then return it
        return $customer;
    }

    public function create(Request $request)
    {

        // validate the request
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        // create a new user
        $customer = new Customer();

        // fill with the data from the response (we can trust that is valid, because is validated on the request creation)
        $customer->fill($request->all());

        // save to the database
        $customer->save();

        // respond without payload
        return response(null, 201); // 201 - Created
    }

    public function edit(int $customerId, Request $request)
    {
        // validate the request
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        // first find the model
        $customer = Customer::findOrFail($customerId);

        // fill with the data from the response (we can trust that is valid, because is validated on the request creation)
        $customer->fill($request->all());

        // save to the database
        $customer->save();

        // return the updated customer
        return $customer;
    }

    public function delete(int $customerId)
    {
        // first find the model
        $customer = Customer::findOrFail($customerId);

        // just delete the customer (the model is binded automatically)
        $customer->delete();

        // respond without payload
        return response()->noContent(); // 204 - success with no content
    }
}
