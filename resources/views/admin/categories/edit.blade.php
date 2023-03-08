@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>Edit category</h3>

                <form class="form" action="{{route('categories.update', $category)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form__input">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$category->title}}" />
                    </div>
                    <div class="form__input">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$category->slug}}" />
                    </div>
                    <div class="form__input">
                        <label>Summary</label>
                        <textarea rows="10" name="detail">{{$category->summary}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Image</label>
                        <input type="file" name="photo" />
                    </div>
                    <div class="form__input">
                        <label>Status</label>
                        <input type="text" name="price" value="{{$category->status}}" />
                    </div>

                    <div class="form__action">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
