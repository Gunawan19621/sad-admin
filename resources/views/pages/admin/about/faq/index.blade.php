@extends('layouts.master-dashboard')
@section('title', 'FAQ')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">FAQ</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">FAQ</h4>
                </div>
                <div class="col-6 card-header text-end">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Add New
                        question</button>
                </div>
            </div>
            <div class="">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%">No</th>
                            <th style="width: 20%">Category</th>
                            <th style="width: 25%">Question</th>
                            <th style="width: 32%">Answer</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($faq as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name_category_faq ?? '-' }}</td>
                                <td>{{ $items->question_faq ?? '-' }}</td>
                                <td>{{ $items->answer_faq ?? '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <form action="{{ route('dashboard.faq.destroy', $items->id) }}" method="POST"
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
    @include('pages.admin.about.faq.modals')
@endsection
