<html>
<head>
    <title>Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
</style>
<center>
    <h4>Transaction</h4>
    <h6>Cashier: {{auth()->user()->name}}</h6>
    <h6>Print at: {{now()}}</h6>
</center>
<hr>
<center>

    <table class="table table-bordered center" id="dataTable"
{{--           style="width:50%" --}}
           width="50%" cellspacing="0">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaction->detail as $item)
            <tr>
                <th>{{$item->product->name}}</th>
                <th>Rp. {{number_format($item->price,0,',','.')}}</th>
                <th>{{number_format($item->qty)}}</th>
                <th>Rp. {{number_format($item->qty*$item->price,0,',','.')}}</th>
            </tr>
        @endforeach

        <th></th>
        <th></th>
        <th>Total</th>
        <th>Rp. {{number_format($transaction->total,0,',','.')}}</th>
        </tbody>
    </table>

</center>
</body>
</html>