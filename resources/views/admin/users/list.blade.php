@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')


            <div class="section__article">
                <div class="section__sub-head">
                    <h3>Users</h3>
                    <a class="btn success small" href="{{route('admin.users.create')}}">New User</a>
                </div>


                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Verified</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)

                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <h4>{{$user->name}}</h4>
                                <div class="email">{{$user->email}}</div>
                            </td>
                            <td>{{$user->email_verified_at ? 'Yes': 'No'}}</td>
                            <td><div class="role-{{$user->role}}">{{$user->role}}</div></td>
                            <td>
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn small">Edit</a>
                                <button class="small secondary">Delete</button>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
