@extends('layout')

@section('content')

    <div class="container">
        <h1>Vartotojai</h1>
        <div class="section">
            @include('users.menu')


            <div class="section__article">
                <div class="section__sub-head">
                    <h3>Vartotojai</h3>
                    <a class="btn success small" href="{{route('users.create')}}">New User</a>
                </div>


                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Orders</th>
                        <th>Verified</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)

                        <tr>
                            <th>{{$user->id}}</th>
                            <td>
                                <h4><a href="{{route('users.edit', $user->id)}}">{{$user->title}}</a></h4>

                                <small>{{$user->first_name}} {{$user->last_name}}</small>
                                <div class="email">{{$user->email}}</div>
                            </td>
                            <th>{{count($user->orders) ? count($user->orders) : ''}}</th>

                            <td>{{$user->email_verified_at ? 'Yes': 'No'}}</td>
                            <td><div class="role-{{$user->role}}">{{$user->role}}</div>
                                @if (count($user->events))
                                    <div>Events: <b>{{count($user->events)}}</b></div>
                                @endif
                            </td>
                            <td class="action">
                                <div>
                                    <a href="{{route('users.edit', $user->id)}}" class="btn small">Edit</a>


                                    <button onclick="openConfirmation('user-{{$user->id}}')" class="small secondary">Delete</button>

                                    <div id="user-{{$user->id}}" class="overlay">
                                        <h5>Are you sure?</h5>
                                        <div class="overlay__actions">

                                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="small secondary">Delete</button>
                                            </form>

                                            <button class="small" onclick="closeConfirmation('user-{{$user->id}}')">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
