@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')


            <div class="section__article">

                <div class="section__sub-head">
                    <h3>Categories</h3>
                    <a class="btn small success" href="{{route('categories.create')}}">New Category</a>
                </div>

                <ul>
                    @foreach($categories as $category)

                        <li class="event admin">
                            <div class="event__image">
                                <img src="{{$category->photo}}" alt="{{$category->title}}" />
                            </div>

                            <div class="event__content">
                                <h4>{{$category->title}}</h4>
                                <div>{{$category->summary}}</div>

                                <div class="price with-icon">
                                    <a class="btn small" href="{{route('categories.edit', $category)}}">Edit</a>


                                    <button onclick="openConfirmation('category-{{$category->id}}')" class="secondary small">Delete</button>

                                    <div id="category-{{$category->id}}" class="overlay">
                                        <h5>Are you sure?</h5>
                                        <div class="overlay__actions">

                                            <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="secondary small">Delete</button>
                                            </form>

                                            <button class="small" onclick="closeConfirmation('category-{{$category->id}}')">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
