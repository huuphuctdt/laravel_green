<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Product::orderBy('id', 'desc')->get();
        return view('admin.layout.product.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.layout.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'price' => 'required|min:0',
            'qty' => 'required|min:0',
            'active' => 'required|boolean',
            'image' => 'image|mimes:png,jpg,jpeg|max:10240'
        ]);

        if ($request->image) {
            $imageName = uniqid() . '.' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'price_new' => $request->price_new ?? null,
            'qty' => $request->qty,
            'weight' => $request->weight ?? null,
            'image' => $imageName,
            'active' => $request->active,
        ]);

        return redirect()->route('product.index')->with('success', 'Insert Successfully !');
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
        $data = Product::find($id);
        return view('admin.layout.product.edit', compact('data'));
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
        $data = Product::find($id);
        if ($data) {
            $data->name = $request->name;
            $data->save();
            return redirect()->route('product.index')->with('success', "Update Successfully !");
        }
        return redirect()->route('product.index')->with('error', "Can't update !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('product.index')->with('success', 'Delete Successfully !');
        }
        return redirect()->route('product.index')->with('error', "Can't Delete !");
    }
}

