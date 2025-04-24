@extends('layouts.master-dashboard')
@section('title', 'Detail Experience')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.suade-experience.index') }}">Suade Experience</a>
    </li>
    <li class="breadcrumb-item active">Detail Experience</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Image - {{ $suadeExperience->name_experience }}</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Add Image
                    </button>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image Experience</th>
                            <th>created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($ExperienceImage as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_experience))
                                        <img src="{{ asset('images/experience/img/' . $items->image_experience) }}"
                                            alt="Image Experience" class="img-fluid"
                                            style="max-width: 80px; cursor: pointer;" data-bs-toggle="modal"
                                            data-bs-target="#imageModal" onclick="showImageModal(this.src)">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->created_at ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('dashboard.suade-experience.destroyImage', $items->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.suade-experience.storeImage') }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="image_experience" class="form-label">Name Experience Category</label>
                            <input class="form-control" type="file" id="image_experience" name="image_experience[]"
                                accept="image/png, image/jpeg" multiple />
                            <input type="hidden" name="experience_id" value="{{ $suadeExperience->id }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal untuk tampilkan gambar besar -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" style="max-height: 70vh;" alt="Large View">
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImageModal(src) {
            const modalImage = document.getElementById('modalImage');
            modalImage.src = src;
        }
    </script>
@endsection
