@extends('layouts.master-dashboard')
@section('title', 'Our Story')
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-header">Our Story</h5>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Add New
                        Story</button>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Title Story</th>
                            <th>Description Story</th>
                            <th>Year Story</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($ourStory as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_story))
                                        <img src="{{ asset('images/' . $items->image_story) }}" alt="Image Story"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_story ?? '-' }}</td>
                                <td>{{ $items->description_story ?? '-' }}</td>
                                <td>{{ $items->year_story ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalShow{{ $items->id }}">View</button>
                                    <form action="{{ route('dashboard.our-story.destroy', $items->id) }}" method="POST"
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
                                <td colspan="6" style="text-align: center;">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.layouts.our-story.modals')
@endsection
