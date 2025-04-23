@extends('layouts.master-dashboard')
@section('title', 'Experience Category')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Experience Category</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Experience Category</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        Add Category
                    </button>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Experience Categori</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($experienceCategory as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_experience_category ?? '-' }}</td>
                                <td>
                                    @if ($items->status_experience_category === 1)
                                        Active
                                    @elseif($items->status_experience_category === 0)
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
                                    <form action="{{ route('dashboard.experience-category.destroy', $items->id) }}"
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
                <form action="{{ route('dashboard.experience-category.store') }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label for="name_experience_category" class="form-label">Name Experience Category <span
                                    class="text-danger">*</span></label>
                            <input type="text" id="name_experience_category" class="form-control"
                                name="name_experience_category" placeholder="Enter Name" required />
                        </div>
                        <div class="col mb-3">
                            <label for="status_experience_category" class="form-label">Status <span
                                    class="text-danger">*</span></label>
                            <select name="status_experience_category" id="status_experience_category" class="form-select"
                                required>
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
    @foreach ($experienceCategory as $modalItem)
        <div class="modal fade" id="modalEdit{{ $modalItem->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dashboard.experience-category.update', $modalItem->id) }}" method="POST"
                        enctype="multipart/form-data" id="inputanForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="col mb-3">
                                <label for="name_experience_category" class="form-label">Name Experience Category <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="name_experience_category" class="form-control"
                                    name="name_experience_category" placeholder="Enter Name"
                                    value="{{ $modalItem->name_experience_category }}" required />
                            </div>
                            <div class="col mb-3">
                                <label for="status_experience_category" class="form-label">Status <span
                                        class="text-danger">*</span></label>
                                <select name="status_experience_category" id="status_experience_category"
                                    class="form-select" required>
                                    <option selected disabled> Select Option</option>
                                    <option value="1"
                                        {{ $modalItem->status_experience_category == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"
                                        {{ $modalItem->status_experience_category == 0 ? 'selected' : '' }}>Inactive
                                    </option>
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
    @endforeach
@endsection
