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
                        <a href="#" class="brudcrumb-link">{{ strtoupper($category->name_category_product) }}</a> /
                        <a href="#" class="brudcrumb-link-active">{{ strtoupper($product->name_product) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/' . $product->image_product) }}" alt="" class="full-width-image">

                </div>
                <div class="col-md-6">
                    <p class="text-size-subtitle text-color-coklat">{{ $subcategory->name_sub_category }}</p>
                    <h2 class="text-size-heading text-color-purple ptserif">{{ $product->name_product }}</h2>
                    <p>{{ $product->sub_product }}</p>
                    <table class="table2">
                        <tr>
                            <td>
                                <div class="price-group">YEAR</div>
                                <div class="price-product">{{ $product->year_product }}</div>
                            </td>
                            <td>
                                <div class="price-group">ALCOHOL</div>
                                <div class="price-product">{{ $product->alcohol }}</div>
                            </td>
                            <td>
                                <div class="price-group">SERVING TEMPERATURE</div>
                                <div class="price-product">{{ $product->temperature }}</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="price-group">CELLARING</div>
                            </td>
                            <td>{{ $product->temperature }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="price-group">TOTAL ACIDITY</div>
                            </td>
                            <td>{{ $product->total_acidity }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="price-group">RESIDUAL SUGAR</div>
                            </td>
                            <td>{{ $product->ressidual_sugar }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="price-group">BOTTLES PRODUCED</div>
                            </td>
                            <td>{{ $product->bottle_produced }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="price-group">SIZES</div>
                            </td>
                            <td>{{ $product->size_bottle }}</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="price-group">AWARDS WON</div>
                            </td>
                            <td>{{ $product->award_won }}</td>
                            <td align="right"><a href="#" class="link-coklat">SEE AWARDS</a></td>
                        </tr>
                    </table>

                    <div class="faq">
                        <button class="accordion">
                            GROUND CHARACTERISTICS
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="pannel">
                            {!! $product->characteristics !!}
                        </div>
                    </div>
                    <div class="faq">
                        <button class="accordion">
                            TASTING NOTE
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="pannel">
                            {!! $product->testing_note !!}
                        </div>
                    </div>
                    <div class="faq">
                        <button class="accordion">
                            FOOD PAIRING
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="pannel">
                            {!! $product->food_pairing !!}
                        </div>
                    </div>
                    <br>
                    <button class="btn-coklat">DOWNLOAD PDF</button>
                </div>
            </div>
        </div>
        </div>
    </section>




@endsection
