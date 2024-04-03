
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $title }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

  <center> <h2> {{ $title }}</h2></center>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">eIDKenya</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Document Id: #6</span> <br>
                    <span> {{ $date }}</span> <br>
                    <span>Zip code : 560077</span> <br>
                    <span>Address: #5555, Main road, Maseno , Kenya</span> <br>
                </th>
            </tr>

            
            <tr class="bg-blue" >
            <th>User ID</th>
            <th>Application id</th>
            <th>Application type</th>
            <th>Status</th>
            </tr>

        </thead>
       


    <tbody>
        @foreach ($applications as $item)
            <tr>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->application_type }}</td>
                <td>{{ $item->application_status }}</td>
            </tr>
        @endforeach
    </tbody>

    </table>

</body>
</html>
