@extends('layouts.master-dashboard')
@section('title', 'Stay In Touch')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Stay In Touch</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Stay In Touch</h4>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($stayInTouch as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->email }}</td>
                                <td>{{ $items->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEditHeader{{ $items->id }}">Edit</button>
                                    <form action="{{ route('dashboard.stay-in-touch.destroy', $items->id) }}" method="POST"
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

    <!-- Modal -->
    @include('pages.admin.layouts.stay_in_touch.modals')
@endsection
