@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('products', 'active')
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
                        <a href="#" class="brudcrumb-link-active">PRODUCTS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $no = 1;
    @endphp

    @foreach ($category as $item)
        @if ($no % 2 != 0)
            @php
                $class = '';
            @endphp
        @else
            @php
                $class = 'bg-coklat-muda';

            @endphp
        @endif

        <section class="{{ $class }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h6 class="text-size-title text-color-purple">{{ $item->name_category_product }}</h6>
                        <h2 class="text-size-heading text-color-purple ptserif">{{ $item->subtitle_category }}</h2>
                        {!! $item->description_category_product !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="{{ $class }}">
            <div class="container">
                <div class="row">
                    @forelse  ($item->subcategories as $sub)
                        <div class="col-md-4">
                            <div class="container text-center">
                                <img src="{{ asset('images/' . $sub->image_sub_category) }}" alt="Image 1"
                                    class="full-width-image">
                                <p class="text-title-product">{{ $sub->name_sub_category }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="container text-center">
                                <p class="text-title-product">Data Not Found</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>

    @empty($item->subcategories->isEmpty())
        <section class="{{ $class }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('products.show', $item->id) }}" class="btn-purple">DISCOVER ALL</a>
                    </div>
                </div>
            </div>

        </section>
    @endempty



    @php
        $no++;
    @endphp
@endforeach


@endsection
