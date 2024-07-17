@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('products', 'active')
@section('content')



    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="#" class="brudcrumb-link">PRODUCTS</a> /
                        <a href="#"
                            class="brudcrumb-link-active">{{ strtoupper($category->name_category_product) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">
                        {{ strtoupper($category->name_category_product) }}</h2>
                    <p class="text-size-paragraph text-color-purple">{!! $category->description_category_product !!}</p>

                </div>
            </div>
        </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabs">
                        @foreach ($subcategories as $item)
                            <button class="tab" onclick="filterGallery('{{ $item->id }}',this)">
                                {{ strtoupper($item->name_sub_category) }}</button>
                        @endforeach
                    </div>

                    <div class="gallery">
                        @foreach ($products as $item)
                            <a href="{{ route('products.detail', $item->id) }}">
                                <div class="gallery-item {{ $item->id_sub_category }}">
                                    <div class="gallery-image">
                                        <img src="{{ asset('images/' . $item->image_product) }}">
                                    </div>
                                    <figcaption>{{ $item->name_product }}</figcaption>
                                    <p>{{ $item->year_product }}</p>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        function filterGallery(category, button) {
            var items = document.getElementsByClassName('gallery-item');
            var tabs = document.getElementsByClassName('tab');

            // Remove active class from all tabs
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }

            // Add active class to the clicked tab
            button.classList.add('active');

            for (var i = 0; i < items.length; i++) {
                if (items[i].classList.contains(category)) {
                    items[i].style.display = 'block';
                } else {
                    items[i].style.display = 'none';
                }
            }
        }

        // Display the first tab by default
        window.onload = function() {
            var defaultCategory = '{{ $subcategory->id }}';
            var defaultButton = document.querySelector('.tab');
            filterGallery(defaultCategory, defaultButton);
        }
    </script>


@endsection
