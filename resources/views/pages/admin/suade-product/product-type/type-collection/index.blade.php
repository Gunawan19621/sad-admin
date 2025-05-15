@extends('layouts.master-dashboard')
@section('title', 'Type Collection')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product-type.index') }}">Product Type</a>
    </li>
    <li class="breadcrumb-item active">Type Collection</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Type Collection</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Add Collection
                    </button>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Product Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($typeCollection as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->images_collection))
                                        <img src="{{ asset('images/productType/collection/' . $items->images_collection) }}"
                                            alt="Image type" class="img-fluid" style="max-width: 80px; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            onclick="showImageModal(this.src)">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->name_collection ?? '-' }}</td>
                                <td>{{ $items->productType->name_type ?? '-' }}</td>
                                <td>
                                    @if ($items->status_collection === 1)
                                        Active
                                    @elseif($items->status_collection === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('dashboard.product-type.collectionDestroy', $items->id) }}"
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
                    <h5 class="modal-title" id="modalCenterTitle">Add Collection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.product-type.collectionStore') }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="name_collection" class="form-label">Name Collection <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="name_collection" class="form-control" name="name_collection"
                                placeholder="Enter Name Collection" required />
                            <input type="hidden" name="product_type_id" value="{{ $productType->id }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status_collection">Status <span
                                    class="text-danger">*</span></label>
                            <select name="status_collection" id="status_collection" class="form-select" @required(true)>
                                <option disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="images_collection" class="form-label">Image Collection</label>
                            <input class="form-control" type="file" id="images_collection" name="images_collection"
                                accept="image/png, image/jpeg" />
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

    <!-- Modal Edit -->
    @foreach ($typeCollection as $dataEdit)
        <div class="modal fade" id="modalEdit{{ $dataEdit->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.product-type.collectionUpdate', $dataEdit->id) }}" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="col mb-3">
                                        <label for="images_collection" class="form-label">Image Collection</label>
                                        @if (!empty($dataEdit->images_collection))
                                            <img src="{{ asset('images/productType/collection/' . $dataEdit->images_collection) }}"
                                                alt="Image type" class="img-fluid" style="max-width: 200px;">
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="col mb-3">
                                        <label for="name_collection" class="form-label">Name Collection <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name_collection" class="form-control"
                                            name="name_collection" value="{{ $dataEdit->name_collection }}"
                                            placeholder="Enter Name Collection" required />
                                        <input type="hidden" name="product_type_id" value="{{ $productType->id }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="status_collection">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status_collection" id="status_collection" class="form-select"
                                            @required(true)>
                                            <option disabled selected>Select Status</option>
                                            <option value="1"
                                                {{ $dataEdit->status_collection == 1 ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0"
                                                {{ $dataEdit->status_collection == 0 ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="images_collection" class="form-label">Image Collection</label>
                                        <input class="form-control" type="file" id="images_collection"
                                            name="images_collection" accept="image/png, image/jpeg" />
                                    </div>
                                </div>
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
    @endforeach

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
