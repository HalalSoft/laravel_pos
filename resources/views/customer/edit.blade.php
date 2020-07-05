@extends('layouts.layout')

@section('content')
    <!-- Content Wrapper -->

    <!-- Main Content -->

    <!-- Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Units</h1>
        <p class="mb-4">BumDes - POS Waserda</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Units</h6>
            </div>
        </div>
        <div class="card-body">

        <div class=" col-lg-12">

            <form method="post" action="{{route("unit.update",$data->id)}}">

                {{csrf_field()}}
                {{method_field("patch")}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Unit name" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>
                <a  href="{{route("unit.index")}}" class="btn btn-secondary">Back</a>
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
