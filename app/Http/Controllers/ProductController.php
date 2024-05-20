<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
{
    $products = Product::query();



    $products->when($request->category, function ($query) use ($request) {
        return $query->wherecategory( $request->category);
    });

    $products->when($request->name, function ($query) use ($request) {
        return $query->where( 'name', 'like','%'.$request->name);
    });

    $products = $products->latest()->paginate(7);

    return view('dashboard', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 7);
}



    public function create()
    {
        return view('create');
    }

     //buat store
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'not_regex:/<\s*(script|php|html)/i'],
            'detail' => ['required',  'max:100', 'not_regex:/<\s*(script|php|html)/i'],
            'url' => 'required',
            'category' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Product::create($input);

        return redirect()->route('dashboard')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'max:50', 'not_regex:/<\s*(script|php|html)/i'],
            'detail' => ['required',  'max:100', 'not_regex:/<\s*(script|php|html)/i'],
            'category' => 'required',
            'url' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $product->update($input);

        return redirect()->route('dashboard')
                        ->with('success','Product updated successfully');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard')
                        ->with('success','Product deleted successfully');
    }
    public function home(Request $request)
    {
        $sortBy = $request->input('sort_by', 'name');

        $sortOrder = $request->input('sort_order', 'asc');

        $products = Product::query();

        $products->when($request->category, function ($query) use ($request) {
            return $query->wherecategory( $request->category);
        });

        $products->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        });

       // Sort by name or date based on user selection
        if ($sortBy === 'name') {
        $products->orderBy('name', $sortOrder);
        } elseif ($sortBy === 'date') {
        $products->orderBy('date', $sortOrder); // Perubahan disini
        }

        $products = $products->latest()->get();

        return view('home', compact('products'));



    return view('dashboard', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 7);
    }


}


