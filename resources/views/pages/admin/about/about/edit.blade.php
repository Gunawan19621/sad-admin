@extends('layouts.master-dashboard')
@section('title', 'Edit About')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.about.index') }}">About</a>
    </li>
    <li class="breadcrumb-item active">Edit About</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit About</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.about.update', $about->id) }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="mb-3">
                            @if ($about->image)
                                <img src="{{ asset('images/' . $about->image) }}" alt="Image" class="img-fluid"
                                    style="max-width: 100%; max-height: 250px">
                            @else
                                <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="title">Title About <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title" name="title"
                                value="{{ $about->title }}" placeholder="Enter Title About" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle">Subtitle About <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="subtitle" id="subtitle" cols="30" rows="3"
                                placeholder="Enter Subtitle About" required>{{ $about->subtitle }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description">Description About <span class="text-danger">*</span></label>
                    <textarea id="description" class="form-control" name="description" placeholder="Enter description story" rows="3"
                        required>{{ $about->description }}</textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.about.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description', {
            toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                        'JustifyCenter', 'JustifyRight'
                    ]
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                },
            ],
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
