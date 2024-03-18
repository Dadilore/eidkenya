<span class="text-muted fw-bolder d-block fs-6">
    @if(count($user->roles) > 0)
    @foreach ($user->roles as $role)
        {{ $role->name }} 
        @if (! $loop->last)
            <br>
        @endif
    @endforeach
    @else
    -
    @endif
</span>