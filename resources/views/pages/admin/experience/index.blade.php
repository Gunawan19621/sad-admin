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
                    <a href="{{ route('dashboard.experience.create') }}" class="btn btn-success">Add New Experience</a>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 12%">Image</th>
                            <th style="width: 15%">Title</th>
                            <th style="width: 45%">Subtitle</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($experience as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image))
                                        <img src="{{ asset('images/' . $items->image) }}" alt="Image Story"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_experience ?? '-' }}</td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->subtitle_experience);
                                        $limitedWords = implode(' ', array_slice($words, 0, 15));
                                    @endphp
                                    {{ count($words) > 15 ? $limitedWords . '...' : $items->subtitle_experience }}
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.experience.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.experience.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.experience.destroy', $items->id) }}" method="POST"
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
