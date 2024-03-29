<div class="section__aside">
    <div class="section__aside__box">
        <h3>User menu</h3>

        <ul class="section__aside__nav">
            <li class="{{$active == 'dashboard' ? 'active' : ''}}">
                <a href="{{route('user.dashboard')}}">Dashboard</a>
            </li>
            <li class="{{$active == 'tickets' ? 'active' : ''}}">
                <a href="{{route('user.tickets')}}">Bilietai</a>
            </li>
            <li class="{{$active == 'profile' ? 'active' : ''}}">
                <a href="{{route('user.profile')}}">Profilis</a>
            </li>
        </ul>
    </div>

    @if (Auth::user()?->isAdmin())

    <div class="section__aside__box --admin">
        <h3>Admin</h3>
        <ul class="section__aside__nav">
            <li class="{{$active == 'events' ? 'active' : ''}}">
                <a href="{{route('admin.events.index')}}">Renginiai</a>
            </li>
            <li class="{{$active == 'users' ? 'active' : ''}}">
                <a href="{{route('users.index')}}">Vartotojai</a>
            </li>
            <li class="{{$active == 'categories' ? 'active' : ''}}">
                <a href="{{route('categories.index')}}">Kategorijos</a>
            </li>
        </ul>
    </div>

    @endif

    @if (Auth::user()?->isOrganizer())

        <div class="section__aside__box --organizer">
            <h3>Organizer</h3>
            <ul class="section__aside__nav">
                <li class="{{$active == 'events' ? 'active' : ''}}">
                    <a href="{{route('organizer.events.index')}}">Renginiai</a>
                </li>
            </ul>
        </div>

    @endif
</div>
