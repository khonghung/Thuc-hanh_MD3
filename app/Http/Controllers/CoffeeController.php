<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Models\CoffeeCategory;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffees = Coffee::all();
        $categories = CoffeeCategory::all();
        return view('coffees.list', compact('coffees', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CoffeeCategory::all();
        return view('coffees.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coffee = new Coffee();
        $coffee->name = $request->name;
        $coffee->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $coffee->image = $path;
        }
        $coffee->category_id = $request->category_id;
        $coffee->save();
        return redirect()->route('coffees.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coffee = Coffee::findOrFail($id);
        $categories = CoffeeCategory::all();
        return view('coffees.update', compact('coffee', 'categories'));
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
        $coffee = Coffee::findOrFail($id);
        $coffee->name = $request->name;
        $coffee->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $coffee->image = $path;
        }
        $coffee->category_id = $request->category_id;
        $coffee->save();
        return redirect()->route('coffees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coffee = Coffee::findOrFail($id);
        $coffee->delete();
        return redirect()->route('coffees.index');
    }

    function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('coffees.index');
        }
        $coffees = Coffee::where('name', 'LIKE', '%' . $keyword . '%');
        return view('coffees.list', compact('coffees'));
    }


}
