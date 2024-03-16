<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333; /* Black color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #fff; /* Black border */
            padding: 10px;
            text-align: left;
        }

        thead {
            background-color: #fff; /* Red color */
            color: #000; /* White color */
        }

        tbody {
            background-color: #fff; /* Blue color */
            color: #000; /* White color */
        }

        /* Add more styles as needed */

        /* Example: Logo styling */
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>

<!-- <div class="logo-container">
    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" class="logo">
</div> -->

<h2>Title: {{ $title }}</h2>
<h2>Date: {{ $date }}</h2>

<table class="table table-bordered">
    <thead>
        <tr>
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
