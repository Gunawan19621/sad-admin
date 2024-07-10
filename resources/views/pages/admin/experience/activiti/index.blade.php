@extends('layouts.master-dashboard')
@section('title', 'Activiti')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Activiti</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Activiti</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.activiti.create') }}" class="btn btn-success">Add New Activiti</a>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 10%">Image</th>
                            <th style="width: 22%">Title</th>
                            <th style="width: 40%">subtitle_activiti</th>
                            <th style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($activiti as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_activiti))
                                        <img src="{{ asset('images/' . $items->image_activiti) }}" alt="Image Activiti"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_activiti ?? '-' }}</td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->subtitle_activiti);
                                        $limitedWords = implode(' ', array_slice($words, 0, 15));
                                    @endphp
                                    {{ count($words) > 15 ? $limitedWords . '...' : $items->subtitle_activiti }}
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.activiti.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.activiti.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.activiti.destroy', $items->id) }}" method="POST"
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
@endsection
