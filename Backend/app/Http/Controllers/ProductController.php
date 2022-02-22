<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */



    public function __construct()
    {

    }


    public function index()
    {
        return Product::leftJoin('product_categories as Cate', 'Cate.id','=','products.category_id')
            ->select('Cate.name as cate_name', 'products.*')
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
                return response()->json(["message" => "Select image first."]);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::where('id', $id)->first();
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
        $product = null;
        $name= $request['name'];
        $description = $request['description'];
        $price = $request['price'];
        $category_id = $request['category_id'];
        if ($request['image']){
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
        }
        else{
            $product = Product::where('id', $id)->update([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category_id' => $category_id,
            ]);
        }
        return response()->json(["message" => "Uploaded Succesfully", "product" => $product]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return response()->json(["message" => "Delete Succesfully"]);
    }

    public function search(Request $request)
    {
        $name = $request->has('name') ? $request->get('name') : null;
        if($name){
            return Product::where('name', 'like', '%'.$name.'%')->get();
        }
        return response()->json(["error" => "Product name doesn't exist."]);
    }
}
