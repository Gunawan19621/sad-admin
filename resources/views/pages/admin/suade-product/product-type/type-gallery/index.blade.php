@extends('layouts.master-dashboard')
@section('title', 'Type Gallery')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product-type.index') }}">Product Type</a>
    </li>
    <li class="breadcrumb-item active">Type Gallery</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Type Gallery</h4>
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
                            <th>Image</th>
                            <th>Product Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($typeGallery as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_product_type))
                                        <img src="{{ asset('images/productType/gallery/' . $items->image_product_type) }}"
                                            alt="Image type" class="img-fluid" style="max-width: 80px; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            onclick="showImageModal(this.src)">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->productType->name_type ?? '-' }}</td>
                                <td>
                                    @if ($items->status_gallery === 1)
                                        Active
                                    @elseif($items->status_gallery === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.product-type.galleryDestroy', $items->id) }}"
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
                    <h5 class="modal-title" id="modalCenterTitle">Add Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.product-type.galleryStore') }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="image_product_type" class="form-label">Image Gallery</label>
                            <input class="form-control" type="file" id="image_product_type" name="image_product_type[]"
                                accept="image/png, image/jpeg" multiple />
                            <input type="hidden" name="product_type_id" value="{{ $productType->id }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status_gallery">Status <span class="text-danger">*</span></label>
                            <select name="status_gallery" id="status_gallery" class="form-select" @required(true)>
                                <option disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
