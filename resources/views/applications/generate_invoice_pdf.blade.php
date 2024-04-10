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
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      span,
      label {
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
      table,
      th,
      td {
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
                <th width="50%" colspan="2">
                    <h2 class="text-start">{{ $title }}</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Receipt Number {{ $receiptNumber }}</span> <br>
                    <span>Date: {{ $date }}</span> <br>
                </th>
            </tr>
            <tr style="background-color: #17C653;" >
                <th width="50%" colspan="2">Invoice Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Application ID no  </td>
                <td> {{ $application->id }}</td>

                <td>Full Name</td>
                <td>{{ $user->surname }}  {{ $user->name }} {{ $user->middle_name }}</td>
            </tr>

            <tr>
                <td>Application Type</td>
                <td>{{ $application->application_type }}</td>

                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <td>Application Status</td>
                <td>{{ $application->application_status }}</td>

                <td>Phone Number</td>
                <td>{{ $user->phone }}</td>
            </tr>
          

        
</tbody>

    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Item
                </th>
            </tr>
            <tr style="background-color: #17C653;">
                <th>ID</th>
                <th>Product</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
           
                <td width="10%">Application ID no {{ $application->id }}</td>
               
                <td>
                    Identitiy Card
                </td>
                <td width="15%" class="fw-bold">1000 ksh</td>
            </tr>
            
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">ksh 1000</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for using eIDKenya, your Identity our priority
    </p>

</body>
</html>