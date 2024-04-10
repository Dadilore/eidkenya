<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $title }}</title>

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        h1, h2, h3, h4, h5, h6, p, span, label {
            font-family: sans-serif;
        }
        table {
            width: 80%; /* Adjust the table width */
            border-collapse: collapse;
        }
        table thead th {
            height: 30px;
            text-align: left;
            font-size: 16px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 4px; /* Reduce padding */
            font-size: 14px;
        }
        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>
    <center><h2>{{ $title }}</h2></center>
    <table>
        <thead>
            <tr>
                <th colspan="6">
                    <h2 class="text-start">eIDKenya</h2>
                </th>
                <th colspan="6" class="text-end company-data">
                    <span>Document Id: #6</span><br>
                    <span>{{ $date }}</span><br>
                    <span>Zip code: 560077</span><br>
                    <span>Address: P.O BOX 47716-00100 NAIROBI GPO</span><br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th>User ID</th>
                <th>Surname</th>
                <th>Middle Name</th>
                <th>Other Names</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Status</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->surname }}</td>
                    <td>{{ $item->middle_name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->sex }}</td>
                    <td>{{ $item->dob }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
