@extends('layouts.master-dashboard')
@section('title', 'Create Activiti')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.activiti.index') }}">Activiti</a>
    </li>
    <li class="breadcrumb-item active">Create Activiti</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Activiti</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.activiti.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_activiti">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_activiti" name="title_activiti"
                                placeholder="Enter Title Activiti" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <label for="image_activiti" class="form-label">Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_activiti" name="image_activiti"
                                accept="image/*" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_activiti">Subtitle <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="subtitle_activiti" id="subtitle_activiti" cols="30" rows="3"
                                placeholder="Enter Subtitle Activiti" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_activiti">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_activiti" class="form-control" name="description_activiti"
                        placeholder="Enter description Resort" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.activiti.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_activiti', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
