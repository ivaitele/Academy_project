@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>New event</h3>

                <form class="form" action="{{route('admin.event.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form__input">
                        <label>Title</label>
                        <input type="text" name="title" value="{{old('title')}}" />
                    </div>
                    <div class="form__input">
                        <label>Detail</label>
                        <textarea name="detail">{{old('detail')}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Venue</label>
                        <input type="text" name="venue" value="{{old('venue')}}" />
                    </div>
                    <div class="form__input">
                        <label>Image</label>
                        <input type="file" name="image" value="{{old('image')}}" />
                    </div>
                    <div class="form__input">
                        <label>Price</label>
                        <input type="text" name="price" value="{{old('price')}}" />
                    </div>
                    <div class="form__input">
                        <label>Duration</label>
                        <input type="text" name="duration" value="{{old('duration')}}" />
                    </div>
                    <div class="form__input">
                        <label>Category</label>
                        <input type="text" name="category_id" value="{{old('category_id')}}" />
                    </div>
                    <div class="form__input">
                        <label>Status</label>
                        <input type="text" name="status" value="{{old('status')}}" />
                    </div>
                    <div class="form__input">
                        <label>Start date</label>
                        <input type="datetime-local" name="start_date" value="{{old('start_date')}}" />
                    </div>
                    <div class="form__input">
                        <label>End date</label>
                        <input type="datetime-local" name="end_date" value="{{old('end_date')}}" />
                    </div>
                    <div class="form__input">
                        <label>Location</label>
                        <input type="text" name="location" value="{{old('location')}}" />
                    </div>
                    <div class="form__input">
                        <label>Organizer</label>
                        <input type="text" name="organizer" value="{{old('organizer')}}" />
                    </div>
                    <div class="form__input">
                        <label>Additional info</label>
                        <textarea name="additional_info">{{old('additional_info')}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Seats</label>
                        <input type="text" name="seat" value="{{old('seat')}}" />
                    </div>
                    <div class="form__action">
                        <button type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
