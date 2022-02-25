<?php

namespace App\Repositories;

use App\Models\DeliveryInfo;

class DeliveryInfoRepository extends EloquentRepository
{

    public function getModel()
    {
        return DeliveryInfo::class;
    }
}
