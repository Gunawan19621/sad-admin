@extends('layouts.master-dashboard')
@section('title', 'Job Applicant')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Work With Us</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Job Applicant</h4>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CV</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($jobApplicant as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->cv_applicant))
                                        <img src="{{ asset('images/' . $items->cv_applicant) }}" alt="cv_applicant"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $items->firstname ?? '-' }} {{ $items->lastname ?? '-' }}
                                </td>
                                <td>{{ $items->email ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.job-applicant.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.job-applicant.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.job-applicant.destroy', $items->id) }}" method="POST"
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
