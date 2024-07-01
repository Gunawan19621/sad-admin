@extends('layouts.master-dashboard')
@section('title', 'Resort')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Resort</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-header">Resort</h5>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.resort.create') }}" class="btn btn-success">Add New Resort</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($resort as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->title_resort ?? '-' }}</td>
                                <td>{{ $items->subtitle_resort ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.resort.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.resort.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.resort.destroy', $items->id) }}" method="POST"
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
                                <td colspan="4" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
