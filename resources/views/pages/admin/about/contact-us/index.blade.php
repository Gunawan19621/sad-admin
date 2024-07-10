@extends('layouts.master-dashboard')
@section('title', 'Contact Us')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Contact Us</li>
@endsection
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-header">Contact Us</h4>
                </div>
            </div>
            <div class=" ">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 25%">Address</th>
                            <th style="width: 25%">Operating Hours</th>
                            <th style="width: 20%">Email</th>
                            <th style="width: 15%">Contact</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($contacts as $items)
                            <tr>
                                <td>
                                    @php
                                        $words = explode(' ', $items->address);
                                        $limitedWords = implode(' ', array_slice($words, 0, 10));
                                    @endphp
                                    {{ count($words) > 10 ? $limitedWords . ' ...' : $items->address }}
                                </td>
                                <td>
                                    @php
                                        $words = explode(' ', $items->operating_hours);
                                        $limitedWords = implode(' ', array_slice($words, 0, 10));
                                    @endphp
                                    {{ count($words) > 10 ? $limitedWords . ' ...' : $items->operating_hours }}
                                </td>
                                <td>{{ $items->email ?? '-' }}</td>
                                <td>
                                    <strong>P </strong>{{ $items->phone ?? '-' }} <br>
                                    <strong>F </strong>{{ $items->fax ?? '-' }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $items->id }}">Edit</button>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalShow{{ $items->id }}">View</button>
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
    @include('pages.admin.about.contact-us.modals')
@endsection
