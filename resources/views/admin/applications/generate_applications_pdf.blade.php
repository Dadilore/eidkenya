

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
           <td>{{$item->user_id}}</td> 
           <td> {{$item->application_id}}</td>
            <td>{{$item->application_type}}</td>
            <td>{{$item->application_status}}</td> 
           
        </tr>
        @endforeach
        
    </tbody>
</table>

