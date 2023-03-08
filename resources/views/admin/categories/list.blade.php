@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')


            <div class="section__article">

                <div class="section__sub-head">
                    <h3>Categories</h3>
                    <a class="btn success" href="{{route('categories.create')}}">New Event</a>
                </div>

                <ul>
                    @foreach($categories as $category)

                        <li class="event admin">
                            <div class="event__image">
                                <img src="{{$category->photo}}" alt="{{$category->title}}" />
                            </div>

                            <div class="event__content">
                                <h4>{{$category->title}}</h4>
                                <div>Category: {{$category->summary}}</div>

                                <div>
                                    <a class="btn" href="{{route('categories.edit', $category)}}">Edit</a>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="secondary">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
