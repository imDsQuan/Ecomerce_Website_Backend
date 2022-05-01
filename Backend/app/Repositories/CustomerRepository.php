<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerRepository extends EloquentRepository
{

    protected AddressRepository $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getModel()
    {
        return Customer::class;
    }

    public function getAll()
    {
        $customers = Customer::all();
        for($i = 0; $i < sizeof($customers); $i++){
            $customers[$i]['address'] = $this->addressRepository->getByCusId($customers[$i]['id']);
        }
        return $customers;
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

    public function update($id, Request $request)
    {
        $customer = Customer::where('id', $id)->update([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'gender'=>$request['gender'],
            'tel'=>$request['tel'],
            'Dob'=>$request['dob'],
        ]);

        Address::where('customer_id',$id)->delete();
        $addresses = $request['addresses'];
        if($addresses){
            for($i = 0; $i < sizeof($addresses); $i++){
                $address = [
                    'customer_id' => $id,
                    'homeNo' => $addresses[$i]['homeNo'],
                    'street' => $addresses[$i]['street'],
                    'city' => $addresses[$i]['city'],
                    'district' => $addresses[$i]['district']
                ];
                Address::create($address);
            }
        }
        return response()->json([
            "messages" => "Updated customer",
            "customer" => $customer,
            ]);
    }

    public function find($id)
    {
        $customer = Customer::where('id', $id) -> first();
        $customer['address'] = $this->addressRepository->getByCusId($customer['id']);
        return $customer;
    }

    public function create(Request $request)
    {
        $customer = Customer::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'gender' => $request['gender'],
            'dob' => $request['dob'],
            'tel' => $request['tel'],
        ]);
        $address = [
            'customer_id' => $customer['id'],
            'homeNo' => $request['homeNo'],
            'street' => $request['street'],
            'city' => $request['city'],
            'district' => $request['district'],
        ];

        $this->addressRepository->create(new Request($address));

        return response(["customer" => $customer,
            "address" => $address,
        ]);
    }

    public function total()
    {
        return Customer::count();
    }

    public function delete($id)
    {
        return Customer::find($id)->delete();
    }
}
