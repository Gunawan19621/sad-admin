@extends('layouts.master-dashboard')
@section('title', 'Category Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Category Product</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Category Product</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Add New
                        Category</button>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Product</th>
                            <th>Subtitle</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($categoryProduct as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_category_product ?? '-' }}</td>
                                <td>{{ $items->subtitle_category ?? '-' }}</td>
                                <td>{{ $items->description_category_product ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    {{-- <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">View</button> --}}
                                    {{-- <a href="{{ route('dashboard.category-product.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.category-product.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a> --}}
                                    <form action="{{ route('dashboard.category-product.destroy', $items->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.products.category-product.models')
@endsection
