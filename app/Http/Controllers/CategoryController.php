<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        if ($category){
            return CategoryResource::make($category);
        }else{
            return response()->json([
                "warning" => "there is no data"
            ]);
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required','min:3'

        ]);

        $category = Category::create([
              'name' => $request->input('name')
        ]);
        if ($category){
            return new CategoryResource($category);
        }

        return response()->json([
            "error" => 403
        ]);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
         Category::destroy($id);
    }
}
