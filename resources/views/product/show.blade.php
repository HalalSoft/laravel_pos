@extends('layouts.layout')

@section('content')
    <!-- Content Wrapper -->

    <!-- Main Content -->

    <!-- Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employeees</h1>
        <p class="mb-4">BumDes - POS Waserda</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
            </div>
        </div>
        <div class="card-body">

        <div class=" col-lg-12">

            <form method="post" action="{{route("employee.update",$data->id)}}">

                {{csrf_field()}}
                {{method_field("patch")}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Employee Name" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" value="{{$data->email}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Email" readonly>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input name="role" type="text" value="{{$data->role->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Role" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Created At</label>
                    <input type="text" value="{{$data->created_at}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="employee name" readonly>
                </div><div class="form-group">
                    <label for="name">Updated At</label>
                    <input type="text" value="{{$data->updated_at}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="employee name" readonly>
                </div>
                <a  href="{{route("employee.index")}}" class="btn btn-secondary">Back</a>
                <a  href="{{route("employee.edit",$data->id)}}" class="btn btn-primary">Edit</a>
            </form>

        </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- End of Main Content -->

@endsection

@section('script')
    <script>

    </script>
@endsection
