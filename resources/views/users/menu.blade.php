<div class="section__aside">
    <div class="section__aside__box">
        <h3>User menu</h3>

        <ul class="section__aside__nav">
            <li class="{{$active == 'dashboard' ? 'active' : ''}}">
                <a href="{{route('user.dashboard')}}">Dashboard</a>
            </li>
            <li><a href="">Tickets</a></li>
            <li class="{{$active == 'profile' ? 'active' : ''}}">
                <a href="{{route('user.profile')}}">Profile</a></li>
        </ul>
    </div>

    @if (Auth::user()?->role === 'admin')

    <div class="section__aside__box --admin">
        <h3>Admin</h3>
        <ul class="section__aside__nav">
            <li class="{{$active == 'events' ? 'active' : ''}}">
                <a href="{{route('admin.events.list')}}">Events</a>
            </li>
            <li class="{{$active == 'users' ? 'active' : ''}}"><a href="{{route('admin.users.list')}}">Users</a></li>
            <li class="{{$active == 'profile' ? 'active' : ''}}">
                <a href="{{route('user.profile')}}">Bookings</a></li>
        </ul>
    </div>

    @endif
</div>
