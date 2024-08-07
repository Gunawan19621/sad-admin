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
                            <th style="width: 8%">No</th>
                            <th style="width: 20%">Category Product</th>
                            <th style="width: 22%">Subtitle</th>
                            <th style="width: 35%">Description</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($categoryProduct as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_category_product ?? '-' }}</td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->subtitle_category);
                                        $limitedWords = implode(' ', array_slice($words, 0, 10));
                                    @endphp
                                    {{ count($words) > 10 ? $limitedWords . '...' : $items->subtitle_category }}
                                </td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->description_category_product);
                                        $limitedWords = implode(' ', array_slice($words, 0, 10));
                                    @endphp
                                    {{ count($words) > 10 ? $limitedWords . '...' : $items->description_category_product }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <form action="{{ route('dashboard.category-product.destroy', $items->id) }}"
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
    @include('pages.admin.products.category-product.models')
@endsection
