@extends('app')
@section('title', 'Profile')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <p class="mb-0">Hello, my name is {{ ucwords($name) }}</p>

        <h3 class="my-2">My History</h3>

        <div class="col-sm-12 col-md-6 text-center">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, repudiandae dolorum vel ipsam ipsa magni possimus sunt facilis id suscipit asperiores dolor amet obcaecati vero quibusdam in sequi quas sit!</p>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="btn btn-dark" href="{{ $github }}" target="_blank">GitHub</a>
            </div>
            <div class="col-6">
                <a class="btn btn-dark ml-3" href="{{ $linkedin }}" target="_blank">LinkedIn</a>
            </div>
        </div>
    </div>
@endsection
