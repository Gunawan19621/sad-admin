@extends('layouts.master-dashboard')
@section('title', 'Experience')
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-header">Experience</h5>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Add New
                        Experience</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($experience as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->title_experience ?? '-' }}</td>
                                <td>{{ $items->subtitle_experience ?? '-' }}</td>
                                <td>{{ $items->description_experience ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalShow{{ $items->id }}">View</button>
                                    <form action="{{ route('dashboard.experience.destroy', $items->id) }}" method="POST"
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
                                <td colspan="5" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.layouts.experience.modals')
@endsection
