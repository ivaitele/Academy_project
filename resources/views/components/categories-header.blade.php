@php
$categories = \App\Models\Category::query()->get();
@endphp

@foreach($categories as $category)
    <li><a href="{{route('events.category', $category->slug)}}">{{$category->title}}</a></li>
@endforeach

<li><a href="{{route('events.list')}}">All Events</a></li>
