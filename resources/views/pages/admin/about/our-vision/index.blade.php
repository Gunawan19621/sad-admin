@extends('layouts.master-dashboard')
@section('title', 'Our Vision')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Our Vision</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Our Vision</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.our-vision.create') }}" class="btn btn-success">Add New Vision</a>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($ourVision as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_vision))
                                        <img src="{{ asset('images/' . $items->image_vision) }}" alt="Image Vision"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_vision ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.our-vision.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.our-vision.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.our-vision.destroy', $items->id) }}" method="POST"
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
