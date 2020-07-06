<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        $data = Employee::all();

        return view('employee.index', compact('data'));
    }

    public function store()
    {
        $data = [
            'name'     => request()->name,
            'email'    => request()->email,
            'password' => Hash::make(request()->password),
            'role_id'  => request()->role_id,
        ];
        $data = Employee::create($data);
        alert()->info('Create is successfully!');

        if ($data) {
            return redirect(route('employee.index'));
        }

        return redirect()->back();
    }

    public function create()
    {
        $roles = Role::all();

        return view('employee.create', compact('roles'));
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        $roles = Role::all();

        return view('employee.edit', compact('data', 'roles'));
    }

    public function update($id)
    {
        $data = Employee::findOrFail($id);

        $data->update(request()->only('name', 'email', 'role_id'));

        if (request()->password) {
            $data->password = Hash::make(request()->password);
            $data->save();
        }

        alert()->info('Update is successfully!');

        return redirect(route('employee.index'));
    }

    public function show($id)
    {
        $data = Employee::findOrFail($id);

        return view('employee.show', compact('data'));
    }

    public function destroy($id)
    {
        $data = Employee::find($id);
        if ($data) {
            $data->destroy($id);
        }
        alert()->info('Delete is successfully!');

        return redirect()->back();
    }
}
