@extends('layouts.master-dashboard')
@section('title', 'About')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">About</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">About</h4>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 10%">Image</th>
                            <th style="width: 25%">Title</th>
                            <th style="width: 42%">Subtitle</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($about as $items)
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
                                <td>{{ $items->title ?? '-' }}</td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->subtitle);
                                        $limitedWords = implode(' ', array_slice($words, 0, 15));
                                    @endphp
                                    {{ count($words) > 15 ? $limitedWords . '...' : $items->subtitle }}
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.about.edit', $items->id) }}"
                                        class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('dashboard.about.show', $items->id) }}"
                                        class="btn btn-sm btn-info">View</a>
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
