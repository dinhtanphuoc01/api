<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;

class APIProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if ($id == null) {
            $products = Product::all();
            return response()->json(['api' => view('api')->render(), 'products' => $products], 200);
        } else {
            return $this->show($id);
        }
        
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
        $products = new Product;

        $products->name = $request->input('name');
        $products->detail = $request->input('detail');
        $products->image = $request->input('image');
        $products->price = $request->input('price');
        $products->categories_id = $request->input('categories_id');

        $products->save();

        return response()->json(['api' => view('api')->render(), 'products' => $products], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return response()->json(['api' => view('api')->render(), 'products' => $products], 200);
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
        $products = Product::find($id);

        $products->name = $request->input('name');
        $products->detail = $request->input('detail');
        $products->image = $request->input('image');
        $products->price = $request->input('price');
        $products->categories_id = $request->input('categories_id');

        $products->save();

        return response()->json(['api' => view('api')->render(), 'products' => $products], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);

        $products->save();

        return response()->json(['api' => view('api')->render(), 'products' => $products], 200);

    }
}
