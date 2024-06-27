@extends('layouts.master-dashboard')
@section('title', 'Show Our Vision')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show New Vision</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="">
                        <label class="form-label">Image Vision</label>
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('images/' . $ourVision->image_vision) }}" alt="Image Story" class="img-fluid"
                            style="max-width: 100%; max-height: 250px">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="title_vision">Title Vision</label>
                        <input class="form-control" id="title_vision" value="{{ $ourVision->title_vision }}" readonly />
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label" for="description_vision">Description Vision</label>
                <textarea id="description_vision" class="form-control" rows="3" readonly>{{ $ourVision->description_vision }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.our-vision.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_vision', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
