@extends('layouts.master-dashboard')
@section('title', 'Product Type')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Product Type</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Product Type</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Add Type
                    </button>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image Type</th>
                            <th>Name Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($productType as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->images_hero_type))
                                        <img src="{{ asset('images/productType/' . $items->images_hero_type) }}"
                                            alt="Image Experience" class="img-fluid" style="max-width: 80px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->name_type ?? '-' }}</td>
                                <td>
                                    @if ($items->status_type === 1)
                                        Active
                                    @elseif($items->status_type === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Add Type
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.product-type.gallery', $items->id) }}">Type
                                                    Gallery</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.product-type.collection', $items->id) }}">Type
                                                    Collection</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.product-type.tour', $items->id) }}">Type
                                                    Tour</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.product-type.story', $items->id) }}">Type
                                                    Story</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">
                                        Edit
                                    </button>

                                    <form action="{{ route('dashboard.product-type.destroy', $items->id) }}" method="POST"
                                        style="display: inline;">
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
                <form action="{{ route('dashboard.product-type.store') }}" method="POST" enctype="multipart/form-data"
                    id="inputanForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="images_hero_type" class="form-label">Image Type <span
                                    class="text-danger">*</span></label>
                            <input type="file" id="images_hero_type" class="form-control" name="images_hero_type"
                                accept="image/png, image/jpeg" required />
                        </div>
                        <div class="col mb-3">
                            <label for="name_type" class="form-label">Name Type <span class="text-danger">*</span></label>
                            <input type="text" id="name_type" class="form-control" name="name_type"
                                placeholder="Enter Name Type" required />
                        </div>
                        <div class="col mb-3">
                            <label for="status_type" class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status_type" id="status_type" class="form-select" required>
                                <option selected disabled> Select Option</option>
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

    <!-- Modal Edit -->
    @foreach ($productType as $modalItem)
        <div class="modal fade" id="modalEdit{{ $modalItem->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.product-type.update', $modalItem->id) }}" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class=" mb-1 text-center">
                                        <label class="form-label">Image Product</label>
                                    </div>
                                    <div class="mb-3">
                                        @if ($modalItem->images_hero_type)
                                            <img src="{{ asset('images/productType/' . $modalItem->images_hero_type) }}"
                                                alt="Image type" class="img-fluid"
                                                style="max-width: 100%; max-height: 250px">
                                        @else
                                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="name_type">Name Type <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="name_type" name="name_type"
                                            value="{{ $modalItem->name_type }}" placeholder="Enter Name Type" required />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="status_type">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status_type" id="status_type" class="form-select" required>
                                            <option disabled selected>Select Status</option>
                                            <option value="1" {{ $modalItem->status_type == 1 ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0" {{ $modalItem->status_type == 0 ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="images_hero_type">Images Type</label>
                                <input class="form-control" type="file" id="images_hero_type" name="images_hero_type"
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
    @endforeach
@endsection
