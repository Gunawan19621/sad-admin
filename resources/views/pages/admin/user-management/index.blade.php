@extends('layouts.master-dashboard')
@section('title', 'Management User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Management User</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Management User</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.user-management.create') }}" class="btn btn-success">Add New User</a>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 10%">Image</th>
                            <th style="width: 20%">Name</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 17%">Phone</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($userManagement as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->photo))
                                        <img src="{{ asset('storage/' . $items->photo) }}" alt="Image" class="img-fluid"
                                            style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->name ?? '-' }}</td>
                                <td>{{ $items->email ?? '-' }}</td>
                                <td>{{ $items->phone ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.user-management.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.user-management.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.user-management.destroy', $items->id) }}"
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
@endsection
