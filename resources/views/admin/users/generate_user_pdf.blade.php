

<h2 align="center"> {{ $title }}</h2>
<h2>Date: {{ $date }}</h2>

<table class="table table-bordered">
    <thead>
        <tr>
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
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
           <td>{{$item->id}}</td> 
           <td> {{$item->surname}}</td>
            <td>{{$item->middle_name}}</td>
            <td>{{$item->name}}</td> 
           <td> {{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->sex}}</td> 
           <td> {{$item->dob}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->role}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>

