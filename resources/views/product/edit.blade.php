@extends('layouts.layout')

@section('content')
    <!-- Content Wrapper -->

    <!-- Main Content -->

    <!-- Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employees</h1>
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
                           placeholder="employee name" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" value="{{$data->email}}" class="form-control" id="address" aria-describedby="emailHelp"
                           placeholder="Email" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" value="{{$data->phone}}" class="form-control" id="phone" aria-describedby="emailHelp"
                           placeholder="Password" required>
                    <small id="emailHelp" class="form-text text-warning">Leave empty if not changed</small>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">- Select Role -</option>
                        <?php foreach ($roles as $role) { ?>
                        <option value="<?= $role->id ?>"
                        <?= $data->id == $role->id ? "selected" : null ?>
                        ><?= $role->name ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <a  href="{{route("employee.index")}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Save</button>
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
