<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $data = Unit::all();

        return view('unit.index', compact('data'));
    }

    public function store()
    {
        $data = ['name' => request()->name];
        $data = Unit::create($data);
        alert()->info('Create is successfully!');

        if ($data) {
            return redirect(route('unit.index'));
        }

        return redirect()->back();
    }

    public function create()
    {
        return view('unit.create');
    }

    public function edit($id)
    {
        $data = Unit::findOrFail($id);

        return view('unit.edit', compact('data'));
    }

    public function update($id)
    {
        $data = Unit::findOrFail($id);

        $data->update(request()->only('name'));

        alert()->info('Update is successfully!');

        return redirect(route('unit.index'));
    }

    public function show($id)
    {
        $data = Unit::findOrFail($id);

        return view('unit.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = Unit::find($id);
        if ($data) {
            $data->destroy($id);
        }
        alert()->info('Delete is successfully!');

        return redirect()->back();
    }
}
