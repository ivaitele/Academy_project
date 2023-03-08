@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>New Category</h3>

                <form class="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form__input">
                        <label>Title</label>
                        <input type="text" name="title" value="{{old('title')}}" />
                    </div>
                    <div class="form__input">
                        <label>Slug</label>
                        <textarea name="slug">{{old('slug')}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Summary</label>
                        <input type="text" name="summary" value="{{old('summary')}}" />
                    </div>
                    <div class="form__input">
                        <label>Image</label>
                        <input type="file" name="photo" value="{{old('photo')}}" />
                    </div>
                    <div class="form__input">
                        <label>Status</label>
                        <input type="text" name="status" value="{{old('status')}}" />
                    </div>
                    <div class="form__action">
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
