@extends('layouts.master-dashboard')
@section('title', 'Show User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.suade-experience.index') }}">Suade Experience</a>
    </li>
    <li class="breadcrumb-item active">Show Experience</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show User</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class=" mb-1 text-center">
                        <label class="form-label">Image Product</label>
                    </div>
                    <div class="mb-3">
                        @if ($suadeExperience->image_experience)
                            <img src="{{ asset('images/experience/' . $suadeExperience->image_experience) }}"
                                alt="Image experience" class="img-fluid" style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="name_experience">Name Experience</label>
                        <input class="form-control" type="text" id="name_experience"
                            value="{{ $suadeExperience->name_experience }}" readonly />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <input type="text" class="form-control"
                            value="{{ $suadeExperience->category->name_experience_category ?? '-' }}" readonly />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status_experience">Status</label>
                        <input type="text" class="form-control"
                            value="{{ $suadeExperience->status_experience == 1 ? 'Active' : 'Inactive' }}" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="price_experience">Price Experience</label>
                        <div class="input-group">
                            <span class="input-group-text">RP.</span>
                            <input class="form-control" type="number" id="price_experience"
                                value="{{ $suadeExperience->price_experience }}" readonly />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="discount_experience">Discount Experience <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="number" id="discount_experience"
                                value="{{ $suadeExperience->discount_experience }}" readonly />
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="subtitle_experience">Subtitle Experience</label>
                <textarea class="form-control" id="subtitle_experience" cols="30" rows="3" readonly>{{ $suadeExperience->subtitle_experience }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="description_experience">Description Experience</label>
                <textarea class="form-control" id="description_experience" cols="30" rows="3" readonly>{{ $suadeExperience->description_experience }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" for="additional_experience">Additional Experience</label>
                <textarea class="form-control" id="additional_experience" cols="30" rows="3" readonly>{{ $suadeExperience->additional_experience }}</textarea>
            </div>

            <div class="text-center">
                <a href="{{ route('dashboard.suade-experience.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_experience', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('additional_experience', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
