<i class="text-muted">@if ($user->lastLoginAt())
{{ $user->lastLoginAt()->diffForHumans() }}
@else
Never
@endif
</i>