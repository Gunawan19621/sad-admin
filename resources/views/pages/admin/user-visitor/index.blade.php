@extends('layouts.master-dashboard')
@section('title', 'User Visitor')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">User Visitor</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">User Visitor</h4>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>Status</th>
                            <th>Actions</th>
                            {{-- <th style="width: 20%">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($userVisitor as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->firstname_account ?? '-' }} {{ $items->lastname_account ?? '-' }}</td>
                                <td>{{ $items->email_account ?? '-' }}</td>
                                <td>{{ $items->birthdate_account ?? '-' }}</td>
                                <td>
                                    @if ($items->status_account === 1)
                                        Active
                                    @elseif($items->status_account === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.user-visitor.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('dashboard.user-visitor.destroy', $items->id) }}" method="POST"
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
