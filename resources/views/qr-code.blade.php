@extends('app')
@section('title', 'Qr Code')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1>{{ ucwords($name) }}</h1>

        <h3 class="mt-4">Scan Me</h3>

        <img src="{{ asset('storage/qrcodes/' . $qrcode . '.png') }}" alt="Qr Code" />
        <a href="{{ $url }}">Link do QrCode</a>
    </div>
@endsection
