@props(['selected' => 2])

@php
$users = \App\Models\User::query()->where('role', 'organizer')->get();
@endphp

<select name="user_id">
    @foreach($users as $user)
        <option value="{{$user->id}}" {{$user->id == $selected ? 'selected' : ''}}>{{$user->name}}</option>
    @endforeach
</select>
