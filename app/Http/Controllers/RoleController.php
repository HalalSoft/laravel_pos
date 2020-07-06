<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $data = Role::all();

        return view('role.index', compact('data'));
    }

    public function store()
    {
        $data = ['name' => request()->name];
        $data = Role::create($data);
        alert()->info('Create is successfully!');

        if ($data) {
            return redirect(route('role.index'));
        }

        return redirect()->back();
    }

    public function create()
    {
        return view('role.create');
    }

    public function edit($id)
    {
        $data = Role::findOrFail($id);

        return view('role.edit', compact('data'));
    }

    public function update($id)
    {
        $data = Role::findOrFail($id);

        $data->update(request()->only('name'));

        alert()->info('Update is successfully!');

        return redirect(route('role.index'));
    }

    public function show($id)
    {
        $data = Role::findOrFail($id);

        return view('role.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = Role::find($id);
        if ($data) {
            $data->destroy($id);
        }
        alert()->info('Delete is successfully!');

        return redirect()->back();
    }
}
