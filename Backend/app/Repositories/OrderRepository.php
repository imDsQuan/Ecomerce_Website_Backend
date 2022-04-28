<?php

namespace App\Repositories;

use App\Models\DeliveryInfo;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class OrderRepository extends EloquentRepository
{

    protected $orderItemRepository;
    protected $deliveryInfoRepository;
    protected $productRepository;

    public function __construct(OrderItemRepository $orderRepository,
                                DeliveryInfoRepository $deliveryInfo,
                                ProductRepository $productRepository)
    {
        $this->orderItemRepository = $orderRepository;
        $this->deliveryInfoRepository = $deliveryInfo;
        $this->productRepository = $productRepository;
    }

    public function getModel()
    {
        return Order::class;
    }

    public function getAll()
    {
        return DB::table('orders')->leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name', 'customers.gender', 'customers.dob', 'customers.tel')
            ->get();
    }

    public function create(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request['customer'],
            'total' => $request['total'],
            'payment_method' => $request['payment_method'],
            'status' => 'Pending',
            'order_date' => Date::now(),
        ]);

        $orderItems = json_decode($request['order_items'], true);
        for ($i = 0; $i < sizeof($orderItems); $i++){
            $orderItem = [
                'order_id' => $order['id'],
                'product_id' => $orderItems[$i]['product']['id'],
                'quantity' => $orderItems[$i]['quantity'],
                'size'=> rand(0, 3),
                'price' => $orderItems[$i]['price'],
            ];

            $this->orderItemRepository->create($orderItem);
        }


        $deliveryInfo = ([
            'order_id' => $order['id'],
            'delivery_services_id' => $request['deliveryService'],
            'receiver_name' => $request['name'],
            'tel' => $request['tel'],
            'address' => $request['address'],
        ]);

        $this->deliveryInfoRepository->create($deliveryInfo);

        return response()->json([
            "order" => $order,
            "deliveryInfo" => $deliveryInfo,
        ]);
    }

    public function find($id)
    {
        $order['order'] = DB::table('orders')->join('delivery_infos','orders.id', '=', 'delivery_infos.order_id')
            ->join('delivery_services', 'delivery_services.id', '=', 'delivery_infos.delivery_services_id')
            ->select('delivery_services.id as deli_id', 'delivery_services.name as deli_name', 'delivery_services.price as deli_price' ,
                'delivery_infos.receiver_name as name', 'delivery_infos.address as address', 'delivery_infos.tel as tel', 'delivery_infos.delivery_date', 'delivery_infos.delivery_arrived',
                'orders.*')->where('orders.id' , $id)->first();

        $orderItems = $this->orderItemRepository->getByOrderId($id);
        for($i = 0; $i < sizeof($orderItems); $i++){
            $product = $this->productRepository->find($orderItems[$i]['product_id'])->toArray();
            $orderItems[$i]['product'] = $product;
        }
        $order['item'] = $orderItems;

        return $order;
    }


    public function update($id, Request $request)
    {
        $order = Order::find($id);

        if($status = $request['status']){

            $order->status = $status;

            if($status == 'Delivered'){
                DeliveryInfo::where('order_id', '=', $id)
                    ->update(['delivery_date' => Date::now()]);
            } else if($status == 'Completed'){
                DeliveryInfo::where('order_id', '=', $id)
                    ->update(['delivery_arrived' => Date::now()]);
            }

            $order->save();
        }else {
            $order = Order::find($id)->update([
                'customer_id' => $request['customer'],
                'total' => $request['total'],
                'payment_method' => $request['payment_method']
            ]);

            $orderItems = json_decode($request['order_items'], true);
            OrderItem::where('order_id', '=', $id)->delete();
            for ($i = 0; $i < sizeof($orderItems); $i++){
                $this->orderItemRepository->create([
                    'order_id' => $id,
                    'product_id' => $orderItems[$i]['product']['id'],
                    'quantity' => $orderItems[$i]['quantity'],
                    'size'=> rand(0, 3),
                    'price' => $orderItems[$i]['price'],
                ]);
            }


            $deliveryInfo = DeliveryInfo::where('order_id', '=', $id)->update([
                'order_id' => $id,
                'delivery_services_id' => $request['deliveryService'],
                'receiver_name' => $request['name'],
                'tel' => $request['tel'],
                'address' => $request['address'],
            ]);

            return response()->json([
                "order" => $order,
                "deliveryInfo" => $deliveryInfo,
            ]);
        }
    }

    public function recent(){
        return DB::table('orders')
//            ->where('status', '<>' ,'Refunded')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name')
            ->offset(0)->limit(10)->orderBy('created_at', 'desc')->get();
    }

    public function totalProfit(){
        return Order::sum('total');
    }

    public function total()
    {
        return Order::count(); // TODO: Change the autogenerated stub
    }


}
