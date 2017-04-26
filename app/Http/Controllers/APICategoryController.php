<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\hHttp\Response;
use App\Category;

class APICategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

        if ($id == null) {
            $categories = Category::all();
            return response()->json(['categories' => $categories], 200);
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Category;

        $categories->name = $request->input('name');
        $categories->parent_id = $request->input('parent_id');

        $categories->save();

        return response()->json(['categories' => $categories], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
        return response()->json(['categories' => $categories], 200);
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
        $categories = Category::find($id);

        $categories->name = $request->input('name');
        $categories->parent_id = $request->input('parent_id');

        $categories->save();

        return response()->json(['categories' => $categories], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $categories = Category::find($id);

        $categories->delete();

        return response()->json(['categories' => $categories], 200);
        
    }
}
