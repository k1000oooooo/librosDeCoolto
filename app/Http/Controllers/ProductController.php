<?php

namespace App\Http\Controllers;

use App\product;
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
        $products = Product::all();

        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required|string|min:3",
            "price" => "required|numeric",
            "description" => "required|max:280",
            "avatar" => "required|mimes:jpeg,jpg,png,gif|max:10000",
        ],[
            "required" => "El campo es obligatorio.",
            "numeric" => "Debe ingresar números.",
            "max" => "La imagen no puede superar los 10 MB.",
            "mines" => "El formato de la imagen debe ser jpeg,jpg,png,gif."
        ]);

        $nuevoUsuario = new Product;
        $nuevoUsuario->title = $request->title;
        $nuevoUsuario->price = $request->price;
        $nuevoUsuario->description = $request->description;
        $nuevoUsuario->avatar = $request->avatar;
    
        $nuevoUsuario->save();

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $products = Product::find($id);
        return view('products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $this->validate($request,[
            "title" => "required|string|min:3",
            "price" => "required|numeric",
            "description" => "required|max:280",
            "avatar" => "required|mimes:jpeg,jpg,png,gif|max:10000",
        ],[
            "required" => "El campo es obligatorio.",
            "price" => "Debe ingresar números.",
            "max" => "La imagen no puede superar los 10 MB.",
            "mines" => "El formato de la imagen debe ser jpeg,jpg,png,gif."
        ]);

        $nuevoUsuario = new Product;
        $nuevoUsuario->title = $request->title;
        $nuevoUsuario->price = $request->price;
        $nuevoUsuario->description = $request->description;
        $nuevoUsuario->avatar = $request->avatar;
    
        $nuevoUsuario->save();

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
