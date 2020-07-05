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

            <form method="post" action="{{route("customer.update",$data->id)}}">

                {{csrf_field()}}
                {{method_field("patch")}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Customer name" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input name="address" type="text" value="{{$data->address}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Address" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input name="phone" type="text" value="{{$data->phone}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Phone" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Created At</label>
                    <input type="text" value="{{$data->created_at}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Customer name" readonly>
                </div><div class="form-group">
                    <label for="name">Updated At</label>
                    <input type="text" value="{{$data->updated_at}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Customer name" readonly>
                </div>
                <a  href="{{route("customer.index")}}" class="btn btn-secondary">Back</a>
                <a  href="{{route("customer.edit",$data->id)}}" class="btn btn-primary">Edit</a>
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
