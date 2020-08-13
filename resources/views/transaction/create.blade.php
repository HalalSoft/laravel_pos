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
                <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route("transaction.store")}}">

                <div class="row">

                    {{csrf_field()}}

                    <div class=" col-lg-8">


                        <div class="form-group">
                            <label>Customer</label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">- Select Customer -</option>
                                <?php foreach ($customers as $customer) { ?>
                                <option value="<?= $customer->id ?>"
                                <?= $_SESSION["customer_id"] ?? 0 == $customer->id ? "selected" : null ?>
                                ><?= $customer->name ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product</label>
                            <select name="product_id" class="form-control eva-nganu" onchange="this.form.submit()">
                                <option value="">- Select Product -</option>
                                <?php foreach ($products as $product) { ?>
                                <option value="<?= $product->id ?>" data-unit="{{$product->unit->name}}"
                                        data-category="{{$product->category->name}}"
                                        data-barcode="{{$product->barcode}}"
                                        data-stock="{{$product->qty}}" @if($product->qty < 1)disabled @endif><?= $product->name.' '.$product->barcode    ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($selected_products as $item)
                                <tr id="p{{$item["id"]}}">

                                    <td>{{$item["id"]}}</td>
                                    <td>{{$item["name"]}}</td>
                                    <td class="price">{{$item["price"]}}</td>
                                    <td><input min="1" name="selected_products[{{$item["id"]}}]"
                                               data-price="{{$item["price"]}}"
                                               data-subtotal="{{$item["price"] * $item["qty"]}}" class="qty"
                                               type="number"
                                               value="{{$item["qty"]}}" style="width: 51px;"> pcs
                                    </td>
                                    <td class="subtotal">{{$item["price"] * $item["qty"]}}</td>
                                    <th><a href="javascript:void(0);" onclick="destroyData({{$item["id"]}})"><i
                                                    class="fas fa-fw fa-trash"></i></a>
                                    </th>
                                </tr>
                            @endforeach


                            <tr>
                                <th></th>
                                <th colspan="3">Discount</th>

                                <th>
                                    <input name="discount" type="number" id="discount"
                                           value="{{$_SESSION["discount"] ?? 0}}" style="width: 121px;">
                                </th>
                                <th></th>
                            </tr>

                            <tr>
                                <th></th>
                                <th colspan="3">Total</th>

                                <th id="total">{{$total}}</th>
                                <th><input name="total" type="hidden" id="totalinput"
                                           value="{{$total}}" style="width: 121px;"></th>
                            </tr>

                            <tr>
                                <th></th>
                                <th colspan="3">Cash</th>

                                <th>
                                    <input name="cash" type="number" id="cash" min="1"
                                           value="{{$_SESSION["cash"] ?? 0}}" style="width: 121px;" required>
                                </th>
                                <th></th>
                            </tr>

                            <tr>
                                <th></th>
                                <th colspan="3">Change</th>

                                <th id="change">0</th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>

                        <a href="{{route("transaction.index")}}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success float-right">Create Transaction</button>

                    </div>

                </div>
            </form>

        </div>
        <!-- /.container-fluid -->

        <!-- End of Main Content -->

        @endsection

        @section('script')
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

            <script>
                var nganu = null;
                var total = {{$total}};

                function destroyData(id) {
                    return $("#p"+id).remove();
                }


                function money(nStr) {
                    nStr += '';
                    x = nStr.split('.');
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + '.' + '$2');
                    }
                    return x1 + x2;
                }

                function formatState(state) {
                    if (!state.id) {
                        return state.text;
                    }
                    var unit = $(state.element).data("unit");
                    var category = $(state.element).data("category");
                    var stock = $(state.element).data("stock");
                    var barcode = $(state.element).data("barcode");

                    var $state = $(
                        '<span>' + state.text + '(Stock: ' + stock + ' ' + unit + ') - ' + category + '</span>'
                    );
                    return $state;
                }

                $(".eva-nganu").select2({
                    templateResult: formatState
                });
                $(document).ready(function () {
                    $("#cash").change(function (e) {
                        e.stopImmediatePropagation();
                        $("#change").text($(this).val() - total)
                    })
                });

                $(document).on('change', '#discount', function () {
                    total = 0;
                    $('.qty').each(function (i, obj) {
                        // console.log();
                        total = total + $(obj).data("subtotal");
                        //test
                    });
                    total = total - $(this).val()
                    $("#totalinput").val(total)
                    $("#total").text(total);

                });
                $(document).on('change', '.qty', function () {
                    nganu = $(this);
                    // alert($(this).data("price"))
                    var price = $(this).data("price");
                    var subtotal = price * $(this).val();

                    $(this).data("subtotal", subtotal);
                    $('.qty').each(function (i, obj) {
                        // console.log();
                        total = total + $(obj).data("subtotal");
                        //test
                    });
                    total = total - $("#discount").val()

                    $("#totalinput").val(total)
                    console.log($("#discount").val());
                    $("#total").text(money(total - $("#discount").val()));
                    $(this).parent().next().text(money(price * $(this).val()))
                    // console.log($(this).parent().prev().text(),"zz")
                });
            </script>
@endsection
