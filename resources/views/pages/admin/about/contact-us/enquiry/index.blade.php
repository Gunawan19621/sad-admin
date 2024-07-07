@extends('layouts.master-dashboard')
@section('title', 'Contact Us')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Enquiry</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Enquiry</h4>
            <div class="table-responsive text-nowrap">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Enquiring</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($enquiry as $items)
                            <tr>
                                <td>{{ $items->name ?? '-' }}</td>
                                <td>{{ $items->phone ?? '-' }}</td>
                                <td>{{ $items->email ?? '-' }}</td>
                                <td>{{ $items->enquiring ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalShow{{ $items->id }}">View</button>
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
    @include('pages.admin.about.contact-us.enquiry.modals')
@endsection
