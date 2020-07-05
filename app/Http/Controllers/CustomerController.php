<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Unit;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $data = Customer::all();

        return view("customer.index",compact('data'));
    }

    public function store()
    {
        $data = ["name" => request()->name,
                 "address" => request()->address,
                 "phone" => request()->phone];
        $data = Customer::create($data);
        alert()->info("Create is successfully!");

        if ($data) {

            return redirect(route("customer.index"));

        }

        return redirect()->back();
    }

    public function create()
    {


        return view("customer.create");
    }

    public function edit($id)
    {

        $data = Customer::findOrFail($id);

        return view("customer.edit",compact('data'));
    }

    public function update($id)
    {

        $data = Customer::findOrFail($id);

        $data->update(request()->only("name"));

        alert()->info("Update is successfully!");

        return redirect(route("customer.index"));
    }

    public function show($id)
    {

        $data = Customer::findOrFail($id);

        return view("customer.show",compact('data'));
    }

    public function destroy($id)
    {

        $data = Customer::find($id);
        if ($data) {
            $data->destroy($id);

        }
        alert()->info("Delete is successfully!");

        return redirect()->back();
    }
}
