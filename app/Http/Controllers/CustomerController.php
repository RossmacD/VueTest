<?php
namespace App\Http\Controllers;
use App\Customer;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerResourceCollection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show(Customer $customer):CustomerResource{
        return new CustomerResource($customer);
    }
    public function index(): CustomerResourceCollection{
        return new CustomerResourceCollection(Customer::paginate());
    }

    public function store(Request $request){
    $request->validate([
        'first_name'=>'required',
        'last_name' => 'required',
        'email' => 'required',
    ]);
    $customer=Customer::create($request->all());
    return new CustomerResource($customer);
    }

    public function update(Customer $customer, Request $request):CustomerResource{
        $request->validate([
            'first_name'=>'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
        $customer->update($request->all());
        return new CustomerResource($customer);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return response()->json();
    }
}
