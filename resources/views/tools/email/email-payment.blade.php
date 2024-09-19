<!DOCTYPE html>
<html>
<head>
    <title>Client Email</title>
    <style>
        /* Basic styling for email layout */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        p {
            margin: 5px 0;
        },
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, {{ $data['fullname'] }}</h1>
        
        <p><strong>OR:</strong> {{ $data['OR'] }}</p>
        <p><strong>PO:</strong> {{ $data['PO'] }}</p>
        <p><strong>Delivered To:</strong> {{ $data['Deliveredto'] }}</p>
        <p><strong>Terms:</strong> {{ $data['Terms'] }}</p>
        <p><strong>Address:</strong> {{ $data['Address'] }}</p>
        <p><strong>Payment Status:</strong> {{ $data['Payment_status'] }}</p>
        <p><strong>Date Delivered:</strong> {{ $data['Deliveredto'] }}</p>
        <p><strong>Fullname:</strong> {{ $data['fullname'] }}</p>
        <h1  style="text-align:center;">Check(s) Out Order</h1>
        <table  style="width:100%; text-align:center; border:1px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style=" border:1px solid black; border-collapse: collapse;">Product</th>
                    <th style=" border:1px solid black; border-collapse: collapse;">Brand</th> 
                    <th style=" border:1px solid black; border-collapse: collapse;">Mg</th>
                    <th style=" border:1px solid black; border-collapse: collapse;">Qty</th>
                    <th style=" border:1px solid black; border-collapse: collapse;">Unit Price</th>
                    <th style=" border:1px solid black; border-collapse: collapse;">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['orders'] AS $item)
                <tr>
                <td style=" border:1px solid black; border-collapse: collapse;">{{$item->product_name}}</td>
                <td style=" border:1px solid black; border-collapse: collapse;">{{$item->brand_name}}</td>
                <td style=" border:1px solid black; border-collapse: collapse;">{{$item->mg}}</td>
                <td style=" border:1px solid black; border-collapse: collapse;">{{$item->quantity}}</td>
                <td style=" border:1px solid black; border-collapse: collapse;"> ₱ {{number_format($item->selling_price,2)}}</td>
                <td style=" border:1px solid black; border-collapse: collapse;"> ₱ {{number_format($item->total_amount,2)}}</td>
                </tr>
                @endforeach
                @if(!empty($data['freebies']))

                    @foreach($data['freebies'] AS $item)
                    <tr>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->product_name}}</td>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->brand_name}}</td>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->mg}}</td>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->quantity}}</td>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{number_format($item->selling_price,2)}}</td>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->totalamount}}</td>
                    </tr>
                    @endforeach
                @else
                @endif
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td > Total Amount </td>
                    <td style=" border:1px solid black; border-collapse: collapse;">₱ {{$data['exactAmount']}}</td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td > Balance Remaining </td>
                    <td style=" border:1px solid black; border-collapse: collapse;">₱ {{$data['balanceamount']}}</td>
                </tr>
            </tbody>
          </table>


          @if(!empty($data['payments']))
            <h1 style="text-align:center;">Payment list</h1>
          <table style="width:100%; text-align:center; border:1px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style=" border:1px solid black; border-collapse: collapse;">Payment</th>
                    <th style=" border:1px solid black; border-collapse: collapse;">Payment Method</th> 
                    <th style=" border:1px solid black; border-collapse: collapse;">Serial Number</th>
                    <th style=" border:1px solid black; border-collapse: collapse;">Payment Date</th>
                </tr>               
            </thead>
            <tbody>
                <tbody>
                    @foreach($data['payments'] AS $item)
                    <tr>
                        
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->payment_mode}}</th> 
                        <td style=" border:1px solid black; border-collapse: collapse;">{{!empty($item->number) ?$item->number : 'none'}}</th>
                        <td style=" border:1px solid black; border-collapse: collapse;">{{$item->pay_date}}</th>
                        <td style=" border:1px solid black; border-collapse: collapse;">₱ {{number_format($item->payment,2)}}</th>
                    </tr>   

                    @endforeach
                    <tr>
                        <td ></td>
                        <td ></td>
                        <td >Total payment(s)</td>
                        <td style=" border:1px solid black; border-collapse: collapse;">₱ {{$data['totalallpayment']}}</td>
                    </tr>
                </tbody>
            </tbody>

          </table>


          @else


          @endif

         




        <p>Thank you!</p>
    </div>
</body>
</html>


