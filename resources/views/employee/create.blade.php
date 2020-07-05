@extends('layouts.layout')

@section('content')
    <!-- Content Wrapper -->

    <!-- Main Content -->

    <!-- Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Customers</h1>
        <p class="mb-4">BumDes - POS Waserda</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
            </div>
        </div>
        <div class="card-body">

        <div class=" col-lg-12">

            <form method="post" action="{{route("customer.store")}}">

                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="customer name" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control" id="address" aria-describedby="emailHelp"
                           placeholder="address" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone" aria-describedby="emailHelp"
                           placeholder="phone" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>
                <a  href="{{route("customer.index")}}" class="btn btn-secondary">Back</a>
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
