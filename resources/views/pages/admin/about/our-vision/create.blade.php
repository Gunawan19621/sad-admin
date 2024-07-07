@extends('layouts.master-dashboard')
@section('title', 'Create Our Vision')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-vision.index') }}">Our Vision</a>
    </li>
    <li class="breadcrumb-item active">Create Vision</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Vision</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.our-vision.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_vision">Title Vision <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_vision" name="title_vision"
                                placeholder="Enter title vision" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label for="image_vision" class="form-label">Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_vision" name="image_vision"
                                accept="image/*" required />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description_vision">Description Vision <span
                            class="text-danger">*</span></label>
                    <textarea id="description_vision" class="form-control" name="description_vision" placeholder="Enter description vision"
                        rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.our-vision.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
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
