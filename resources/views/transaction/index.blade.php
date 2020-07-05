@extends('layouts.layout')


@section('content')
  <!-- Content Wrapper -->

  <!-- Main Content -->

    <!-- Topbar -->
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Transactions</h1>
      <p class="mb-4">BumDes - POS Waserda</a>.</p>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row col-lg-12">

          <div class="col-lg-6">
            <h5 class="m-0 font-weight-bold text-primary" style="padding-top: 10px;">Transactions</h5>
          </div>
          <div class="col-sm-6">
            <a href="{{route("transaction.create")}}" class="btn btn-success float-right">Create Products</a>
          </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Employee</th>
                <th>Date</th>
                <th>Discount</th>
                <th>Created at</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Employee</th>
                <th>Date</th>
                <th>Discount</th>
                <th>Created at</th>
                <th width="10%">Action</th>
              </tr>
              </tfoot>
              <tbody>
            @foreach($data as $item)
              <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->customer->name}}</th>
                <th>{{$item->employee->name ?? "-"}}</th>
                <th>{{$item->date}}</th>
                <th>{{$item->discount}}</th>
                <th>{{$item->created_at}}</th>
                <th><a href="{{route("transaction.show",$item->id)}}"><i class="fas fa-fw fa-eye"></i></a>
                  <a href="{{route("transaction.edit",$item->id)}}"><i class="fas fa-fw fa-edit"></i></a>
                  <a  href="javascript:void(0);" onclick="destroyData({{$item->id}})"><i class="fas fa-fw fa-trash"></i></a>
                </th>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  <!-- End of Main Content -->

  <form method="post" action="" style="display: none" id="deleteData">
{{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">
  </form>


@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('table').DataTable();
    } );


    function destroyData(id) {
      swal({
        icon: 'warning',
        text: 'Are you sure you want to delete this data?',
        buttons: ["No", "Yes"],
        dangerMode: true,
      })
              .then(isClose => {
                if (isClose) {
                  $('#deleteData').attr("action", window.location.href + '/' + id);
                  $('#deleteData').submit();
                } else {
                  swal("Delete data canceled");
                }
              });
    }
  </script>
@endsection
