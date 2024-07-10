@extends('layouts.master-dashboard')
@section('title', 'Our Distributor')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Distributor</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Distributor</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Add New
                        Distributor</button>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 15%">Name</th>
                            <th style="width: 15%">Name Person</th>
                            <th style="width: 15%">Phone</th>
                            <th style="width: 32%">Address</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($ourDistributor as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_distributor ?? '-' }}</td>
                                <td>{{ $items->name_person_distributor ?? '-' }}</td>
                                <td>{{ $items->phone_distributor ?? '-' }}</td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->address_distributor);
                                        $limitedWords = implode(' ', array_slice($words, 0, 10));
                                    @endphp
                                    {{ count($words) > 10 ? $limitedWords . '...' : $items->address_distributor }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <form action="{{ route('dashboard.our-distributor.destroy', $items->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                                    </form>
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
    @include('pages.admin.distributors.modals')
@endsection
