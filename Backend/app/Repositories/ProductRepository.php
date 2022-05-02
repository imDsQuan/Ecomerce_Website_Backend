<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductRepository extends EloquentRepository{

    public function getModel()
    {
        return Product::class;
    }

    public function getAll()
    {
        return Product::leftJoin('product_categories as Cate', 'Cate.id','=','products.category_id')->leftJoin('discounts', 'discounts.product_id', '=', 'products.id')
            ->select('Cate.name as cate_name', 'products.*', 'discounts.discount_percent', 'discounts.price as discount_price')
            ->get();
    }

    public function find($id)
    {
        return Product::leftJoin('product_categories as Cate', 'Cate.id','=','products.category_id')->leftJoin('discounts', 'discounts.product_id', '=', 'products.id')
            ->select('products.*', 'discounts.discount_percent', 'discounts.price as discount_price', 'Cate.name as cate_name')
            ->where('products.id', '=', $id)
            ->first();
    }

    public function create(Request $request){
        if ($request->file('image')){
            $file = $request->file('image');
            $name= $request['name'];
            $description = $request['description'];
            $price = $request['price'];
            $category_id = $request['category_id'];
            $file_name = date('His').'-'.$file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);
            $image_path = 'http://localhost:8000/images/'.$file_name;
            Product::create([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image_path' => $image_path,
                'category_id' => $category_id,
            ]);
            return response()->json(["message" => "Uploaded Succesfully"]);
        }
        else
        {
            return response()->json(["error" => "Select image first."]);
        }
    }

    public function getProfit()
    {
        return DB::table('products')
            ->select('products.name','products.image_path' ,DB::raw('SUM(order_items.price) as total'))
            ->join('order_items', 'products.id','=','order_items.product_id')
            ->groupBy('products.name')
            ->groupBy('products.image_path')
            ->offset(0)->limit(10)
            ->orderBy('total', 'desc')
            ->get();
    }

    public function search(Request $request)
    {
        $name = $request->has('name') ? $request->get('name') : null;
        if($name){
            return Product::leftJoin('discounts', 'discounts.product_id', '=', 'products.id')
                ->select('products.*', 'discounts.discount_percent', 'discounts.price as discount_price')
                ->where('name', 'like', '%'.$name.'%')->get();
        }
        return response()->json(["error" => "Product name doesn't exist."]);
    }

    public function update($id, Request $request)
    {
        $name= $request['name'];
        $description = $request['description'];
        $price = $request['price'];
        $category_id = $request['category_id'];

        if ($request->file('image')){
            $file = $request->file('image');
            $file_name = date('His').'-'.$file->getClientOriginalName();
            $file->move(public_path('images'), $file_name);
            $image_path = 'http://localhost:8000/images/'.$file_name;
            File::delete(Product::where('id', $id)->first()['image_path']);
            $product = Product::where('id', $id)->update([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'image_path' => $image_path,
                'category_id' => $category_id,
            ]);
            return response()->json(["message" => "Uploaded Succesfully", "product" => $product]);

        }
        else{
            return Product::where('id', $id)->update([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category_id' => $category_id,
            ]);
        }
    }

    public function feature()
    {
        return DB::table('products')->leftJoin('discounts', 'discounts.product_id', '=', 'products.id')
        ->select('products.*', 'discounts.discount_percent', 'discounts.price as discount_price')->inRandomOrder()->limit(4)->get();
    }

    public function latest()
    {
        return DB::table('products')->leftJoin('discounts', 'discounts.product_id', '=', 'products.id')
            ->select('products.*', 'discounts.discount_percent', 'discounts.price as discount_price')->orderBy('id', 'desc')->limit(8)->get();
    }
}
