@extends('layouts.master-dashboard')
@section('title', 'Show Activiti')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.activiti.index') }}">Activiti</a>
    </li>
    <li class="breadcrumb-item active">Show Activiti</li>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Activiti</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="">
                        <label class="form-label">Image</label>
                    </div>
                    <div class="mb-3">
                        @if ($activiti->image_activiti)
                            <img src="{{ asset('images/' . $activiti->image_activiti) }}" alt="Image Story"
                                class="img-fluid" style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="title_activiti">Title</label>
                        <input class="form-control" id="title_activiti" value="{{ $activiti->title_activiti }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_activiti">Subtitle</label>
                        <textarea class="form-control" id="subtitle_activiti" cols="30" rows="4" readonly>{{ $activiti->subtitle_activiti }}</textarea>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description_activiti">Description</label>
                <textarea id="description_activiti" class="form-control" rows="3" readonly>{{ $activiti->description_activiti }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.activiti.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_activiti', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection
