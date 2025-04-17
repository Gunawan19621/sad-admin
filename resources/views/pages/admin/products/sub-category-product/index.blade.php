@extends('layouts.master-dashboard')
@section('title', 'Category Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Sub Category</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Sub Category Product</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Add New
                        Sub Category</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Category Product</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($subCategory as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_sub_category))
                                        <img src="{{ asset('images/' . $items->image_sub_category) }}"
                                            alt="image_sub_category" class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->name_category_product ?? '-' }}</td>
                                <td>{{ $items->name_sub_category ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <form action="{{ route('dashboard.sub-category-product.destroy', $items->id) }}"
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

    <!-- Modal -->
    @include('pages.admin.products.sub-category-product.models')
@endsection
