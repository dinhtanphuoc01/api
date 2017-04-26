<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use Validator;
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
            $products = Product::paginate(3);
            return response()->json([
                [
                    'meta'  => [
                        'status'        => 200,
                        'total'         => $products->total(),
                        'total-pages'   => round($products->total() / $products->perPage()),
                        'per-page'      => $products->perPage(),
                        'count'         => $products->count(),
                    ]
                ],
                [
                    'products'  => $products,
                    'links'     => [
                        'seft'  =>  'http://localhost:8080/public/api/product?page=' .$products->currentPage(),
                        'first' => $products->url(1),
                        'prev'  => $products->previousPageUrl(),
                        'next'  => $products->nextPageUrl(),
                        'last'  => 'http://localhost:8080/public/api/product?page=' .$products->lastPage(),
                    ]
                ]
            ]);
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
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255|unique:products',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator,
                'input' => $request,
            ]);
        } else {
            $products = new Product;

            $products->name = $request->input('name');
            $products->detail = $request->input('detail');
            $products->image = $request->input('image');
            $products->price = $request->input('price');
            $products->categories_id = $request->input('categories_id');

            $products->save();

            return response()->json([
                'status'    => 201,
                'message'   => 'Create Ok',
            ]);
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
        $products = Product::findOrFail($id);
        return response([
            [
                'meta'  => [
                    'status'    => 200,
                ]
            ],
            [
                'product'   => $products,
            ],
            [
                'seft'  => 'http://localhost:8080/public/api/product/' .$products['id'],
            ]
        ]);
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
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:255|unique:products',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator,
                'input' => $request,
            ]);
        } else {
            $products = Product::findOrFail($id);

            $products->name = $request->input('name');
            $products->detail = $request->input('detail');
            $products->image = $request->input('image');
            $products->price = $request->input('price');
            $products->categories_id = $request->input('categories_id');

            $products->save();

            return response()->json([
                'status'    => 200,
                'message'   => 'Update Ok',
            ]);
        }
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

        return response()->json([
            'status'    => 200,
            'message'   => 'Delete Ok',
        ]);

    }
}
