@extends('layouts.master-dashboard')
@section('title', 'News & Event')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">News & Event</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">News & Event</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <a href="{{ route('dashboard.news-event.create') }}" class="btn btn-success">Add New News or Event</a>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($newsEvent as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if (!empty($items->image_news_event))
                                        <img src="{{ asset('images/' . $items->image_news_event) }}" alt="Image Story"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->name_category_news_event ?? '-' }}</td>
                                <td>{{ $items->title_news_event ?? '-' }}</td>
                                <td>{{ $items->date_news_event ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('dashboard.news-event.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.news-event.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
                                    <form action="{{ route('dashboard.news-event.destroy', $items->id) }}" method="POST"
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
@endsection
