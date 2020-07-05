<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;
use App\Models\Role;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $data = Product::all();

        return view("product.index", compact('data'));
    }

    public function store()
    {
        $data = [
            "name"     => request()->name,
            "unit_id"     => request()->unit_id,
            "category_id" => request()->category_id,
            "qty" => request()->qty,
            "price"  => request()->price,
            "original_price"  => request()->original_price,
            "description"  => request()->description,
        ];
        $data = Product::create($data);
        alert()->info("Create is successfully!");

        if ($data) {

            return redirect(route("product.index"));

        }

        return redirect()->back();
    }

    public function create()
    {
        $units = Unit::all();
        $categories = Category::all();


        return view("product.create", compact('units', 'categories'));
    }

    public function show($id)
    {

        $data = Product::findOrFail($id);

        return view("product.show", compact('data'));
    }

    public function edit($id)
    {

        $data  = Product::findOrFail($id);
        $units = Unit::all();
        $categories = Category::all();

        return view("product.edit", compact('data', 'units', 'categories'));
    }

    public function update($id)
    {

        $data = Product::findOrFail($id);

        $data->update(request()->only("name","unit_id","category_id", "qty", "price", "original_price", "description"));

        alert()->info("Update is successfully!");

        return redirect(route("product.index"));
    }

    public function destroy($id)
    {

        $data = Product::find($id);
        if ($data) {
            $data->destroy($id);

        }
        alert()->info("Delete is successfully!");

        return redirect()->back();
    }
}
