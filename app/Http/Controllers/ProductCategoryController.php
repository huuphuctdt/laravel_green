<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ProductCategory::orderBy('id', 'desc')->get();
        return view('admin.layout.product-category.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layout.product-category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:255']);
        ProductCategory::create(['name' => $request->name]);
        return redirect()->route('product-category.index')->with('success', 'Insert Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProductCategory::find($id);
        return view('admin.layout.product-category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|max:255']);
        $data = ProductCategory::find($id);
        if ($data) {
            $data->name = $request->name;
            $data->save();
            return redirect()->route('product-category.index')->with('success', "Update Successfully !");
        }
        return redirect()->route('product-category.index')->with('error', "Can't update !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProductCategory::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('product-category.index')->with('success', 'Delete Successfully !');
        }
        return redirect()->route('product-category.index')->with('error', "Can't Delete !");
    }
}
