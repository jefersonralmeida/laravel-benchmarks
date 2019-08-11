<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;

class CustomersController extends Controller
{
    public function index()
    {
        // just return all the customers, paginated
        return Customer::paginate();
    }

    public function view(Customer $customer)
    {
        // just return the customer model (the conversion to json is automatic)
        // the possible non existence of the user is handled automatically
        return $customer;
    }

    public function create(CustomerRequest $request)
    {
        // create a new user
        $customer = new Customer();

        // fill with the data from the response (we can trust that is valid, because is validated on the request creation)
        $customer->fill($request->all());

        // save to the database
        $customer->save();

        // respond without payload
        return response(null, 201); // 201 - Created
    }

    public function update(Customer $customer, CustomerRequest $request)
    {
        // fill with the data from the response (we can trust that is valid, because is validated on the request creation)
        $customer->fill($request->all());

        // save to the database
        $customer->save();

        // return the updated customer
        return $customer;
    }

    public function delete(Customer $customer)
    {
        // just delete the customer (the model is binded automatically)
        $customer->delete();

        // respond without payload
        return response()->noContent(); // 204 - success with no content
    }

}
