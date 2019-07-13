@if($data['is_admin'])
    @if($user->banned)
        <a class="btn btn-success" href="/admin/enable/{{ $user->id }}">Enable</a>
    @else
        <a class="btn btn-primary" href="/user/{{ $user->id }}">Visit</a>
        <a class="btn btn-danger" href="/admin/disable/{{ $user->id }}">Disable</a>
    @endif
@else
    <a class="btn btn-primary" href="/user/{{ $user->id }}">Visit</a>
@endif
