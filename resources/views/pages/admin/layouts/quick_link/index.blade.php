@extends('layouts.master-dashboard')
@section('title', 'Quick Link')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Quick Link</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Quick Link</h4>
            <div class="">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($quickLink as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->title }}</td>
                                <td>{{ strip_tags($items->description ?? '-') }}</td>
                                <td>
                                    <a href="{{ route('dashboard.quick-link.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.quick-link.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
