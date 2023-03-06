@extends('layout')

@section('content')


    <div class="container">
        <h1>Dashboard</h1>
        <div class="section">
            @include('users.menu')

            <div class="section__article">
                <h3>Edit event</h3>

                <form class="form" action="{{route('admin.event.update', $event)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form__input">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$event->title}}" />
                    </div>
                    <div class="form__input">
                        <label>Detail</label>
                        <textarea rows="10" name="detail">{{$event->detail}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Venue</label>
                        <input type="text" name="venue" value="{{$event->venue}}" />
                    </div>
                    <div class="form__input">
                        <label>Image</label>
                        <input type="file" name="image" />
                    </div>
                    <div class="form__input">
                        <label>Price</label>
                        <input type="text" name="price" value="{{$event->price}}" />
                    </div>
                    <div class="form__input">
                        <label>Duration</label>
                        <input type="text" name="duration" value="{{$event->duration}}" />
                    </div>
                    <div class="form__input">
                        <label>Category</label>
                        <input type="text" name="category_id" value="{{$event->category_id}}" />
                    </div>
                    <div class="form__input">
                        <label>Status</label>
                        <input type="text" name="status" value="{{$event->status}}" />
                    </div>
                    <div class="form__input">
                        <label>Start date</label>
                        <input type="datetime-local" name="start_date" value="{{$event->start_date}}" />
                    </div>
                    <div class="form__input">
                        <label>End date</label>
                        <input type="datetime-local" name="end_date" value="{{$event->end_date}}" />
                    </div>
                    <div class="form__input">
                        <label>Location</label>
                        <input type="text" name="location" value="{{$event->location}}" />
                    </div>
                    <div class="form__input">
                        <label>Organizer</label>
                        <input type="text" name="organizer" value="{{$event->organizer}}" />
                    </div>
                    <div class="form__input">
                        <label>Additional info</label>
                        <textarea rows="7" name="additional_info">{{$event->additional_info}}</textarea>
                    </div>
                    <div class="form__input">
                        <label>Seats</label>
                        <input type="text" name="seat" value="{{$event->seat}}" />
                    </div>
                    <div class="form__action">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
