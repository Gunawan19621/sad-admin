@extends('layouts.master-dashboard')
@section('title', 'Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Product</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Product</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.suade-product.create') }}" class="btn btn-success">Add Product</a>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($suadeProduct as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_product ?? '-' }}</td>
                                <td>{{ $items->productCategory->name_category ?? '-' }}</td>
                                <td>{{ $items->productType->name_type ?? '-' }}</td>
                                <td>{{ $items->price_product ?? '-' }}</td>
                                <td>{{ $items->discount_product ?? '-' }}</td>
                                <td>
                                    @if ($items->status_product === 1)
                                        Active
                                    @elseif($items->status_product === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.suade-product.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('dashboard.suade-product.destroy', $items->id) }}" method="POST"
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
@endsection
