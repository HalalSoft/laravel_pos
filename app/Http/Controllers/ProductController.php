<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $data = Product::all();

        return view('product.index', compact('data'));
    }

    public function store(ProductRequest $request)
    {
        $data = Product::create($request->data());
        alert()->info('Create is successfully!');

        if ($data) {
            return redirect(route('product.index'));
        }

        return redirect()->back();
    }

    public function create()
    {
        $units      = Unit::all();
        $categories = Category::all();

        return view('product.create', compact('units', 'categories'));
    }

    public function show($id)
    {
        $data = Product::findOrFail($id);

        return view('product.show', compact('data'));
    }

    public function edit($id)
    {
        $data       = Product::findOrFail($id);
        $units      = Unit::all();
        $categories = Category::all();

        return view('product.edit', compact('data', 'units', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = Product::findOrFail($id);

        $data->update($request->data());

        alert()->info('Update is successfully!');

        return redirect(route('product.index'));
    }

    public function destroy($id)
    {
        $data = Product::find($id);
        if ($data) {
            $data->destroy($id);
        }
        alert()->info('Delete is successfully!');

        return redirect()->back();
    }
}
