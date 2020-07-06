<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $data = Category::all();

        return view('category.index', compact('data'));
    }

    public function store()
    {
        $data = ['name' => request()->name];
        $data = Category::create($data);
        alert()->info('Create is successfully!');

        if ($data) {
            return redirect(route('category.index'));
        }

        return redirect()->back();
    }

    public function create()
    {
        return view('category.create');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);

        return view('category.edit', compact('data'));
    }

    public function update($id)
    {
        $data = Category::findOrFail($id);

        $data->update(request()->only('name'));

        alert()->info('Update is successfully!');

        return redirect(route('category.index'));
    }

    public function show($id)
    {
        $data = Category::findOrFail($id);

        return view('category.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = Category::find($id);
        if ($data) {
            $data->destroy($id);
        }
        alert()->info('Delete is successfully!');

        return redirect()->back();
    }
}
