@extends('layouts.master-dashboard')
@section('title', 'Product')
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-header">Product</h5>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.product.create') }}" class="btn btn-success">Add New Product</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>price</th>
                            <th>stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($product as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_product))
                                        <img src="{{ asset('images/' . $items->image_product) }}" alt="Image Resort"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->name_product ?? '-' }}</td>
                                <td>{{ $items->name_category_product ?? '-' }}</td>
                                <td>{{ $items->price_product ?? '-' }}</td>
                                <td>{{ $items->stock_product ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.product.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.product.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.product.destroy', $items->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
