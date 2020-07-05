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
                           placeholder="product name" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>

                <div class="form-group">
                    <label>Unit</label>
                    <select name="unit_id" class="form-control" required>
                        <option value="">- Select Unit -</option>
                        <?php foreach ($units as $unit) { ?>
                        <option value="<?= $unit->id ?>"
                        <?= $data->unit_id == $unit->id ? "selected" : null ?>
                        ><?= $unit->name ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">- Select Category -</option>
                        <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id ?>"
                        <?= $data->category_id == $category->id ? "selected" : null ?>
                        ><?= $category->name ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="qty">Qty</label>
                    <input name="qty" type="number" value="{{$data->qty}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="qty" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" type="number" value="{{$data->price}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="price" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>

                <div class="form-group">
                    <label for="original_price">Original Price</label>
                    <input name="original_price" type="number" value="{{$data->original_price}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="original price" required>
                    <small id="emailHelp" class="form-text text-danger">This field is required</small>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input name="description" type="text" value="{{$data->description}}" class="form-control" id="name" aria-describedby="emailHelp"
                           placeholder="description">
                </div>

                <a  href="{{route("product.index")}}" class="btn btn-secondary">Back</a>
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
