<?php

namespace App\Http\Controllers;
use Response;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Product::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product=new Product;
         $content = json_decode($request->getContent());
         $product->name=$content->name;
         $product->price=$content->price;
         $product->quantity=$content->quantity;
         $product->totalValue=$product->price*$product->quantity;    
         $product->save();

           //var_dump($content->name);
              
         //$product->price=$content->price;
        // echo $product->price;
         return Response::json(array('success' => true));
          //return Response::json(array('productPrice' => $product->name ));
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
        
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
    public function update(Request $request)
    {
        $content = json_decode($request->getContent());
                               
         $product=Product::find($content->id);
         
         $product->name=$content->name;
         $product->price=$content->price;
         $product->quantity=$content->quantity;
         $product->totalValue=$product->price*$product->quantity;    
         $product->save();

         return Response::json(array('success' => true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
      //  $content = json_decode($request->getContent());
           Product::destroy($id);
           return Response::json(array('success' => $id));                     
        
         //$product->delete();
        
    }
}
