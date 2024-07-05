@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('distributors', 'active')
@section('content')

    <div>
        <img src="{{ asset('images/' . $headers->image_header) }}" alt="Full Width Image" class="full-width-image">
    </div>

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="#" class="brudcrumb-link-active">DISTRIBUTORS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                @foreach ($distributors as $item)
                    <div class="col-md-6">
                        <div class="distributor">
                            <h3 class="text-size-title text-color-purple roboto">{{ $item->name_distributor }}</h3>
                            <br>
                            <h6 class="roboto text-bold text-color-black">ADDRESS</h6><br>
                            <p>{{ $item->address_distributor }}</p>
                            <h6 class="roboto text-bold text-color-black">CONTACT</h6><br>
                            <p>
                                {{ $item->name_person_distributor }} <br>
                                {{ $item->phone_distributor }}
                            </p>
                            <hr>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12 pagination-center">
                    {{ $distributors->links('pagination::bootstrap-4') }}
                </div>
            </div>


        </div>
    </section>



@endsection
