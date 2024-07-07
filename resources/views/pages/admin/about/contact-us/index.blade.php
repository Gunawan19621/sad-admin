@extends('layouts.master-dashboard')
@section('title', 'Contact Us')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Contact Us</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Contact Us</h4>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="max-width: 200px;">Address</th>
                            <th style="max-width: 200px;">Operating Hours</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($contacts as $items)
                            <tr>
                                <td
                                    style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $items->address ?? '-' }}</td>
                                <td
                                    style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $items->operating_hours ?? '-' }}
                                </td>
                                <td>{{ $items->email ?? '-' }}</td>
                                <td>
                                    <strong>P </strong>{{ $items->phone ?? '-' }} <br>
                                    <strong>F </strong>{{ $items->fax ?? '-' }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalShow{{ $items->id }}">View</button>
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
    @include('pages.admin.about.contact-us.modals')
@endsection
