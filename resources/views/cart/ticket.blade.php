@extends('layout')

@section('content')
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <div class="container section">
        <div class="section__article">
            @if ($ticket)
            <h1>Jūsų bilietas</h1>

            <x-ticket :ticket="$ticket" />

            <div class="with-icon">
                <a href="{{route('user.tickets')}}">Atgal</a>
                <button onclick="print()">Spausdinti</button>
            </div>

            @else
                <h1>Bilietas nerastas</h1>
            @endif
        </div>
    </div>
@endsection
