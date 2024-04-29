
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $title }}</title>

    <style>
        html,
        body {
            margin: 5px;
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

    <!-- <center> <h2 style="font-size:60px; color:#17C653;">eIDKenya</h2></center> -->
    <center>
        <span align="center" style="color: red; font-size:60px; ">e</span>
        <span align="center" style="color: #000; font-size:60px; ">I</span>
        <span align="center" style="color: #000; font-size:60px; ">D</span>
        <span align="center" style="color: #008000; font-size:60px; ">K</span>
        <span align="center" style="color: #008000; font-size:60px; ">e</span>
        <span align="center" style="color: #008000; font-size:60px; ">n</span>
        <span align="center" style="color: #008000; font-size:60px; ">y</span>
        <span align="center" style="color: #008000; font-size:60px; ">a</span>
    </center>


    <table class="order-details">
    <thead>
        <tr>
            <th width="100%" colspan="4">
                <h2 class="text-start">{{ $title }}</h2>
            </th>
            <th width="100%" colspan="4" class="text-end company-data">
                <span>Document Id: 6</span> <br>
                <span>{{ $date }}</span> <br>
                <span>Zip code: 560077</span> <br>
                <span>Address: P.O BOX 47716-00100 NAIROBI GPO</span> <br>
            </th>
        </tr>
        <tr style="background-color: #17C653;">
            <th>Huduma Centre</th>
            <th>Biometrics Capture Appointments</th>
            <th>ID pickup Appointments</th>
            <th>Cancelled Appointments</th>
            <th>% Biometrics Capture </th>
            <th>% ID pickup </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applicationTypes as $applicationType)
            <tr>
                <td>{{ $applicationType->application_type }}</td>
                <td>{{ $applicationType->count }}</td>
                <td>{{ $applicationType->completed }}</td>
                <td>{{ $applicationType->uncompleted }}</td>
                <td>{{ number_format(($applicationType->completed / $applicationType->count) * 100, 2) }}%</td>
                <td>{{ number_format(($applicationType->uncompleted / $applicationType->count) * 100, 2) }}%</td>
            </tr>
        @endforeach
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>{{ $totalApplications }}</strong></td>
            <td><b>{{ $totalCompleted }}</b></td>
            <td><b>{{ $totalUncompleted }}</b></td>
            <td><b>{{ number_format(($totalCompleted / $totalApplications) * 100, 2) }}%</b></td>
            <td><b>{{ number_format(($totalUncompleted / $totalApplications) * 100, 2) }}%</b></td>
        </tr>
    </tbody>
</table>



</body>

</html>
