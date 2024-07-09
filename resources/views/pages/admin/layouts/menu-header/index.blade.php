@extends('layouts.master-dashboard')
@section('title', 'Menu Header')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Menu Header</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Menu Header</h4>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($menuHeader as $items)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $items->name_menu }}</strong>
                                </td>
                                <td>
                                    @if (!empty($items->image_header))
                                        <img src="{{ asset('images/' . $items->image_header) }}" alt="Image Header"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_header ?? '-' }}</td>
                                <td>{{ $items->subtitle_header ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEditHeader{{ $items->id }}">Edit</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.layouts.menu-header.modals')
@endsection
