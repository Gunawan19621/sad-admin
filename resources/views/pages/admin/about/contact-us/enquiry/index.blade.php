@extends('layouts.master-dashboard')
@section('title', 'Enquiry')
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
            <div class=" ">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 19%">Name</th>
                            <th style="width: 15%">Contact</th>
                            <th style="width: 25%">Email</th>
                            <th style="width: 18%">Enquiring</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($enquiry as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name ?? '-' }}</td>
                                <td>{{ $items->phone ?? '-' }}</td>
                                <td>{{ $items->email ?? '-' }}</td>
                                <td>{{ $items->type_question_name ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <a href="{{ route('dashboard.enquiry.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">Empty</td>
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
