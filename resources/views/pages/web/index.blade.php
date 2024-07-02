@extends('layouts-web.master-web')
@section('title', 'Sumber Air Dewa')
@section('content')
    <div class="main">
        <div class="lingkaran-besar">
            <div class="lingkaran-sedang">
                <div class="lingkaran-kecil">

                </div>
            </div>
        </div>
        <div class="maincontent">
            <div class="row mb-4 mt-4">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets-web/img/logo-sad2.png') }}" alt="logo" class="img-fluid logo">
                </div>
                <div class="col-md-12 text-center">
                    <a href="#" class="start-link">
                        <img src="{{ asset('assets-web/img/start.png') }}" alt="logo" class="img-fluid start" id="start-image">
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection