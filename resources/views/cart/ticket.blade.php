@extends('layout')

@section('content')
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <div class="container section">
        <div class="section__article">
            @if ($ticket)
            <h1>Jūsų bilietas</h1>

            <x-ticket :ticket="$ticket" />

            <button onclick="print()">Spausdinti</button>
            @else
                <h1>Bilietas nerastas</h1>
            @endif
        </div>
    </div>
@endsection
