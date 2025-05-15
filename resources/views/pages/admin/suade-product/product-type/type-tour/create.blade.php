@extends('layouts.master-dashboard')
@section('title', 'Type Tour')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">..</li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product-type.tour', $productType->id) }}">Product Type</a>
    </li>
    <li class="breadcrumb-item active">Add Tour</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create Tour</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.product-type.tourStore') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_tour">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_tour" name="title_tour"
                                placeholder="Enter Title Tour" required />
                            <input type="hidden" name="product_type_id" value="{{ $productType->id }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status_tour" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status_tour" id="status_tour" class="form-select" @required(true)>
                                <option selected disabled> Select Option</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label class="form-label" for="images_tour">Images Tour</label>
                    <input class="form-control" type="file" id="images_tour" name="images_tour"
                        accept="image/png, image/jpeg" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="subtitle_tour">Subtitle Tour <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="subtitle_tour" id="subtitle_tour" cols="30" rows="3"
                        placeholder="Enter Subtitle Tour"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description_tour">Description Tour <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="description_tour" id="description_tour" cols="30" rows="3"></textarea>
                </div>

                <div class="text-center">
                    <a href="{{ route('dashboard.suade-experience.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_tour', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
