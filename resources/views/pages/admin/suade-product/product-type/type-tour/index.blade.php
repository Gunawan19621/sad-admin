@extends('layouts.master-dashboard')
@section('title', 'Type Tour')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product-type.index') }}">Product Type</a>
    </li>
    <li class="breadcrumb-item active">Type Tour</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Type Tour</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.product-type.tourCreate', $productType->id) }}" class="btn btn-success"> Add
                        Tour</a>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Product Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($typeTour as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->images_tour))
                                        <img src="{{ asset('images/productType/tour/' . $items->images_tour) }}"
                                            alt="Image type" class="img-fluid" style="max-width: 80px; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            onclick="showImageModal(this.src)">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_tour ?? '-' }}</td>
                                <td>{{ $items->productType->name_type ?? '-' }}</td>
                                <td>
                                    @if ($items->status_tour === 1)
                                        Active
                                    @elseif($items->status_tour === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.suade-product.tourEdit', ['id' => $productType->id, 'tourId' => $items->id]) }}"
                                        class="btn btn-sm btn-success">Edit</a>
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

    {{--
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
    </script> --}}

@endsection
