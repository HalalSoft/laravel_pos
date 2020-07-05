@extends('layouts.layout')

@section('content')
    <!-- Content Wrapper -->

    <!-- Main Content -->

    <!-- Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Products</h1>
        <p class="mb-4">BumDes - POS Waserda</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
        </div>
        <div class="card-body">

        <div class=" col-lg-12">

            <form method="post" action="{{route("product.update",$data->id)}}">

                {{csrf_field()}}
                {{method_field("patch")}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" value="{{$data->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Product Name" readonly>
                </div>
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input name="unit_id" type="text" value="{{$data->unit->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Unit" readonly>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input name="category_id" type="text" value="{{$data->category->name}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Role" readonly>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="text" value="{{$data->price}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Price" readonly>
                </div>

                <div class="form-group">
                    <label for="original_price">Original Price</label>
                    <input name="original_price" type="text" value="{{$data->original_price}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="original price" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input name="description" type="text" value="{{$data->original_price}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="Description" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Created At</label>
                    <input type="text" value="{{$data->created_at}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="product name" readonly>
                </div><div class="form-group">
                    <label for="name">Updated At</label>
                    <input type="text" value="{{$data->updated_at}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="product name" readonly>
                </div>
                <a  href="{{route("product.index")}}" class="btn btn-secondary">Back</a>
                <a  href="{{route("product.edit",$data->id)}}" class="btn btn-primary">Edit</a>
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
