<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeCategory;
use App\Http\Requests\CreateCoffeeCategoryRequest;
use App\Http\Requests\UpdateCoffeeCategoryRequest;

class CoffeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CoffeeCategory::all();
        return view('categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCoffeeCategoryRequest $request)
    {
        $category = new CoffeeCategory();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');

    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CoffeeCategory::findOrFail($id);
        return view('categories.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoffeeCategoryRequest $request, $id)
    {
        $category = CoffeeCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CoffeeCategory::findOrFail($id);
        $category->detach();
        $category->delete();
        return redirect()->route('categories.index');
    }
}
