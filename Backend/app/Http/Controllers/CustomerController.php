<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Customer[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        for($i = 0; $i < sizeof($customers); $i++){
            $customers[$i]['address'] = Customer::where('id', $customers[$i]['id'])->first()->addresses->toArray();
        }
        return $customers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'gender' => $request['gender'],
            'dob' => $request['dob'],
            'tel' => $request['tel'],
        ]);

        $address = Address::create([
            'customer_id' => $customer['id'],
            'homeNo' => $request['homeNo'],
            'street' => $request['street'],
            'city' => $request['city'],
            'district' => $request['district'],
        ]);

        return response(["customer" => $customer,
            "address" => $address,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::where('id', $id) -> first();
        $customer['address'] = Customer::where('id', $customer['id'])->first()->addresses->toArray();
        return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id', $id)->delete();
    }

    public function search(Request $request)
    {
        $name = $request->has('name') ? $request->get('name') : null;
        if($name){
            return Customer::where('first_name', 'like', '%'.$name.'%')
                ->orWhere('last_name', 'like', '%'.$name.'%')->get();

        }
        return response()->json(["error" => "Customer name doesn't exist."]);
    }

}
