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
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th width="10%">Action</th>
              </tr>
              </tfoot>
              <tbody>
            @foreach($data as $item)
              <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->name}}</th>
                <th><a href="{{route("unit.show",$item->id)}}"><i class="fas fa-fw fa-eye"></i></a>  <a href="{{route("unit.edit",$item->id)}}"><i class="fas fa-fw fa-edit"></i></a></th>
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
    <input type="hidden" name="_token" value="q7eH6PC9pGuCEfLvElvU7ukbFuqVCKbGyoHj8RuR">
    <input type="hidden" name="_method" value="DELETE">
  </form>


@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('table').DataTable();
    } );
  </script>
@endsection
