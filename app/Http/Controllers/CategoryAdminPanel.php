<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryAdminPanel extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
         Category::create([
              "name" => $request->name
         ]) ;

         $request->session()->flash('status','category has added');
         return redirect('category');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $cat = Category::findOrfail($id);

        $cat->name = $request->input('name');

        $cat->save();

        return redirect('category');
    }


    public function destroy($id)
    {
         Category::destroy($id);

         return redirect('category');
    }
}
