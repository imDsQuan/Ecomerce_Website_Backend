<?php

namespace App\Http\Controllers;

use App\Models\DeliveryInfo;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return DB::table('orders')->leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name', 'customers.gender', 'customers.dob', 'customers.tel')
            ->get();
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


        $order = Order::create([
            'customer_id' => $request['customer'],
            'total' => $request['total'],
            'payment_method' => $request['payment_method'],
            'status' => 'Pending',
            'order_date' => \Illuminate\Support\Facades\Date::now(),
        ]);

        $orderItems = json_decode($request['order_items'], true);
        for ($i = 0; $i < sizeof($orderItems); $i++){
            OrderItem::create([
                'order_id' => $order['id'],
                'product_id' => $orderItems[$i]['product']['id'],
                'quantity' => $orderItems[$i]['quantity'],
                'size'=> rand(0, 3),
                'price' => $orderItems[$i]['price'],
            ]);
        }

        $deliveryInfo = DeliveryInfo::create([
            'order_id' => $order['id'],
            'delivery_services_id' => 1,
            'receiver_name' => $request['name'],
            'tel' => $request['tel'],
            'address' => $request['address'],
        ]);

        return response()->json([
            "order" => $order,
            "deliveryInfo" => $deliveryInfo,
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
        //
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
        $order = Order::find($id);
        $order->status = $request['status'];
        $order->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
