@extends('layouts.master-dashboard')
@section('title', 'Menu Header')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Menu Header</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <h4 class="card-header">Menu Header</h4>
            <div class="">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 17%">Menu</th>
                            <th style="width: 10%">Image</th>
                            <th style="width: 25%">Title</th>
                            <th style="width: 45%">Subtitle</th>
                            <th style="width: 8%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menuHeader as $items)
                            <tr>
                                <td>
                                    <strong>{{ $items->name_menu }}</strong>
                                </td>
                                <td>
                                    @if (!empty($items->image_header))
                                        <img src="{{ asset('images/' . $items->image_header) }}" alt="Image Header"
                                            class="img-fluid" style="max-width: 50px;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $items->title_header ?? '-' }}</td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->subtitle_header);
                                        $limitedWords = implode(' ', array_slice($words, 0, 15));
                                    @endphp
                                    {{ count($words) > 15 ? $limitedWords . '...' : $items->subtitle_header }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEditHeader{{ $items->id }}">Edit</button>
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
    @include('pages.admin.layouts.menu-header.modals')
@endsection
