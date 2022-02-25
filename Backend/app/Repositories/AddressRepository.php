<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository extends EloquentRepository{

    public function getModel()
    {
        return Address::class;
    }

    public function getByCusId($id){
        return Address::where('customer_id',$id)->get();
    }


}
