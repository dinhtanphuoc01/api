<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\hHttp\Response;
use Illuminate\Http\Request;
use Validator;

class APICategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories       = Category::paginate(3);
        $categories_array = $categories->toArray();
        foreach ($categories_array['data'] as $key => $value) {
            $created_at                                   = strtotime($value['created_at']);
            $created_at                                   = date('Y-m-d\TH:i:s.u\Z', $created_at);
            $categories_array['data'][$key]['created_at'] = $created_at;

            $updated_at                                   = strtotime($value['updated_at']);
            $updated_at                                   = date('Y-m-d\TH:i:s.u\Z', $updated_at);
            $categories_array['data'][$key]['updated_at'] = $updated_at;
        }
        return response()->json([
            'meta'       => [
                'status'      => 200,
                'total'       => $categories->total(),
                'total-pages' => round($categories->total() / $categories->perPage()),
                'per-page'    => $categories->perPage(),
                'count'       => $categories->count(),
            ],

            'categories' => $categories_array['data'],

            'links'      => [
                'self'  => 'http://localhost:8080/public/api/category?page=' . $categories->currentPage(),
                'first' => $categories->url(1),
                'prev'  => $categories->previousPageUrl(),
                'next'  => $categories->nextPageUrl(),
                'last'  => 'http://localhost:8080/public/api/category?page=' . $categories->lastPage(),
            ],
        ]);
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
        $validator = Validator::make($request->all(), [
            'name'      => 'required|max:20|unique:categories',
            'parent_id' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator,
                'input' => $request,
            ]);
        } else {
            $categories = new Category;

            $categories->name      = $request->input('name');
            $categories->parent_id = $request->input('parent_id');

            $categories->save();

            return response()->json([
                'status'  => 201,
                'message' => 'Create OK',
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
        $categories       = Category::findOrFail($id);
        $categories_array = $categories->toArray();

        $created_at = strtotime($categories['created_at']);
        $created_at = date('Y-m-d\TH:i:s.u\Z', $created_at);

        $updated_at = strtotime($categories['updated_at']);
        $updated_at = date('Y-m-d\TH:i:s.u\Z', $updated_at);

        return response()->json([
            'meta'     => [
                'status' => 200,
            ],

            'category' => [
                'id'         => $categories_array['id'],
                'name'       => $categories_array['name'],
                'parent_id'  => $categories_array['parent_id'],
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ],

            'seft'     => 'http://localhost:8080/public/api/category/' . $categories['id'],

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
            'name'      => 'required|max:20|unique:categories',
            'parent_id' => 'integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator,
                'input' => $request,
            ]);
        } else {
            $categories = Category::findOrFail($id);

            $categories->name      = $request->input('name');
            $categories->parent_id = $request->input('parent_id');

            $categories->save();

            return response()->json([
                'status'  => 200,
                'message' => 'Update OK',
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
        $categories = Category::findOrFail($id);

        $categories->delete();

        return response()->json([
            'status'  => 200,
            'message' => 'Delete Ok',
        ]);
    }
}
