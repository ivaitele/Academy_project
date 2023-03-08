@props(['selected' => 2])

@php
$categories = \App\Models\Category::query()->get();
@endphp

<select name="category_id">
    @foreach($categories as $category)
        <option value="{{$category->id}}" {{$category->id == $selected ? 'selected' : ''}}>{{$category->title}}</option>
    @endforeach
</select>
