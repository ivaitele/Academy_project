@extends('layout')

@section('content')
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <div class="container section">
        <div class="section__article">
            <h1>Jūsų bilietas</h1>

            <x-ticket :ticket="$ticket" />

        </div>
    </div>
@endsection
