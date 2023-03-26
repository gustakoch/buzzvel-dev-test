@extends('app')
@section('title', 'Generator')

@section('content')
    <div class="d-flex flex-column align-items-center">
        <h1>QR Code Image Generator</h1>

        <form class="row g-3 needs-validation" novalidate method="POST">
            @csrf

            <div class="row mt-4">
                <div class="col-sm-12 col-md-6">
                    <label for="name" class="form-label"><strong>Name:</strong></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Example: John" autocomplete="off" required>
                    <div class="invalid-feedback">
                        A name is required.
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-6">
                    <label for="linkedin" class="form-label"><strong>LinkedIn:</strong></label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Example URL: https://www.linkedin.com/in/john" autocomplete="off" required>
                    <div class="invalid-feedback">
                        A LinkedIn URL is required.
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12 col-md-6">
                    <label for="github" class="form-label"><strong>GitHub:</strong></label>
                    <input type="text" class="form-control" id="github" name="github" placeholder="Example URL: https://github.com/john" autocomplete="off" required>
                    <div class="invalid-feedback">
                        A GitHub URL is required.
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-dark" type="submit">Generate Image</button>
            </div>
        </form>
    </div>
@endsection
