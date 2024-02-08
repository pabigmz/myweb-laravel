<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\product_types;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
       

        return view('products.index',[
            'products' => DB::table('products')
            ->join('product_types','products.product_types_id', '=' , 'product_types.id')
            ->select('products.*','product_types_name')
            ->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_type = product_types::paginate(5);
        return view('products.create',compact('product_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductsRequest $request)
    {
        

        $product = new products();
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->product_types_id = $request->product_types_id;
        $product->save();
        if($request->hasFile('image')){
            $filename = 'product-'.$product->id.'-'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/', $filename);
            $product->image = $filename;
        }else{
            $product->image = 'no-image.jpg';
        }
        $product->save();
        // if($request->hasFile('image')){

        //     $filename = $request->getSchemeAndHttpHost() . '/images/' . time() . '.' . $request->image->extension();
        //     $request->image->move(public_path('/images/'),$filename);

        //     $new_path = str_replace('http://localhost/images/','',$filename);

        //     $request->image=$new_path;

        //     $data=[
        //         'name'=>$request->name,
        //         'cost'=>$request->cost,
        //         'price'=>$request->price,
        //         'quantity'=>$request->quantity,
        //         'image'=>$new_path,
        //         'product_types_id' =>$request->product_types_id
        //     ];
        //     products::insert($data);
        return redirect()->route('products.index')->withSuccess('status'.'New product is added successfully.');
        //}


        
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $product_types_name)
    {
        $products = products::find($id);
        $product_types = product_types::find($product_types_name);
        
        return view('products.show', compact('products','product_types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $product)
    {
        $product_type = product_types::paginate(5);
        return view('products.edit',compact('product_type'),[
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductsRequest $request, products $product)
    {
        if($request->hasFile('image')){
            $b_image = $request->b_image;
            unlink(public_path('images/' . $b_image));
            $filename = 'product-'.$product->id.'-'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/images/', $filename);

            $product = products::find($product->id);
            $product->name = $request->input('name');
            $product->cost = $request->input('cost');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->image = $filename;
            $product->product_types_id = $request->input('product_types_id');
            $product->update();


            

            return redirect()->route('products.index')->withSuccess('Update product is successfully.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $product)
    {
        $pathiamge = $product->image;
        unlink(public_path('images/' . $pathiamge));
        $product -> delete();
        return redirect()->back()->withSuccess('Product deleted successfully');
    }
}
