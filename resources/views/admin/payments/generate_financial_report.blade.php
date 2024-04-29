<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-row {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $title }}</h2>
        <p>Date: {{ $date }}</p>
        <table>
            <thead>
                <tr>
                    <th>Application Type</th>
                    <th>Amount Received</th>
                    <th>Percentage (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($financialData as $applicationType => $amountReceived)
                    <tr>
                        <td>{{ $applicationType }}</td>
                        <td>{{ $amountReceived }}</td>
                        <td>{{ isset($percentageData[$applicationType]) ? $percentageData[$applicationType] : 0 }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td>Total Amount</td>
                    <td>{{ $totalAmount }}</td>
                    <td>100%</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
