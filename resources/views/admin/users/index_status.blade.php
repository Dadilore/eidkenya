@if ($user->status == 'active')
    <span class="badge badge-light-success">
@else
    <span class="badge badge-light-danger">
@endif
{{$user->status}}</span>