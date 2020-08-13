<html>
<head>
	<title>Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>Report per week</h4>

            <h6>Print by: {{auth()->user()->name}}</h6>
            <h6>Print at: {{now()}}</h6>
	</center>
 
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Time</th>
            <th>Total</th>
            <th>Profit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <th>{{$item->months}}</th>
                <th>{{$item->total}}</th>
                <th>{{$item->profit}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>

 
</body>
</html>