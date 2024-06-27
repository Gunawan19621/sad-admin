@extends('layouts.master-dashboard')
@section('title', 'Edit Our Vision')
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit New Vision</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.our-vision.update', $ourVision->id) }}" method="POST"
                enctype="multipart/form-data" id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <label class="form-label">Foto Vision</label>
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('images/' . $ourVision->image_vision) }}" alt="Image Story" class="img-fluid"
                                style="max-width: 100%; max-height: 250px">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="title_vision">Title Vision</label>
                            <input class="form-control" type="text" id="title_vision" name="title_vision"
                                value="{{ $ourVision->title_vision }}" placeholder="Enter title vision" required />
                        </div>
                        <div class="">
                            <label for="image_vision" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image_vision" name="image_vision" />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description_vision">Description Vision</label>
                    <textarea id="description_vision" class="form-control" name="description_vision" placeholder="Enter description vision"
                        rows="3">{{ $ourVision->description_vision }}</textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.our-vision.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_vision', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
