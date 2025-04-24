@extends('layouts.master-dashboard')
@section('title', 'Experience')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Experience</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Experience</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.suade-experience.create') }}" class="btn btn-success">Add Experience</a>
                </div>
            </div>
            <div>
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name Experience</th>
                            <th>Experience Category</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($suadeExperience as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_experience ?? '-' }}</td>
                                <td>{{ $items->category->name_experience_category ?? '-' }}</td>
                                <td>Rp.
                                    {{ isset($items->price_experience) ? number_format($items->price_experience, 0, ',', '.') : '-' }}
                                </td>
                                <td>{{ $items->discount_experience ?? '-' }}%</td>
                                <td>
                                    @if ($items->status_experience === 1)
                                        Active
                                    @elseif($items->status_experience === 0)
                                        Inactive
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.suade-experience.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.suade-experience.show', $items->id) }}"
                                        class="btn btn-sm btn-info">Upload</a>
                                    <form action="{{ route('dashboard.suade-experience.destroy', $items->id) }}"
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
