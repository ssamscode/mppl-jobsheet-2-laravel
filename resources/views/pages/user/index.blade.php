@extends('layouts.user.main')

@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="">
                    <!-- single-slide -->
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Nike New <br>Collection!</h1>
                                <p>Lorem ipsum dolor sit amet...</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start product Area -->
<section class="section_gap">
    <div class="container">

    @if(isset($flashSales) && $flashSales->count())

<div class="row justify-content-center mb-4">
    <div class="col-lg-6 text-center">
        <div class="section-title">
            <h1>Flash Sale 🔥</h1>
            <p>Produk promo dengan harga spesial</p>
        </div>
    </div>
</div>

<div class="row mb-5">

    @foreach($flashSales as $sale)

    <div class="col-lg-3 col-md-6">
        <div class="single-product">

            <img class="img-fluid"
                 src="{{ asset('images/' . $sale->product->image) }}"
                 alt="">

            <div class="product-details">

                <h6>{{ $sale->product->name }}</h6>

                <div class="price">
                    <h6 class="text-danger">
                        {{ $sale->discount_price }} Points
                    </h6>

                    <h6 class="l-through">
                        {{ $sale->product->price }} Points
                    </h6>
                </div>

            </div>

        </div>
    </div>

    @endforeach

</div>

@endif
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Latest Products</h1>
                    <p>Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
        </div>
        <div class="row">

@forelse ($products as $item)
    <div class="col-lg-3 col-md-6">
        <div class="single-product">

            <img class="img-fluid"
                 src="{{ asset('images/' . $item->image) }}"
                 alt="">

            <div class="product-details">

                <h6>{{ $item->name }}</h6>

                <div class="price">
                    <h6>Harga: {{ $item->price }} Points</h6>
                </div>

                <div class="prd-bottom">

                    <a class="social-info"
                       href="javascript:void(0);"
                       onclick="confirmPurchase('{{ $item->id }}', '{{ auth()->id() }}')">
                        <span class="ti-bag"></span>
                        <p class="hover-text">Beli</p>
                    </a>

                    <a href="{{ route('user.product.detail', $item->id) }}"
                       class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">Detail</p>
                    </a>

                </div>

            </div>
        </div>
    </div>

@empty

    <div class="col-lg-12">
        <h3 class="text-center">
            Tidak ada produk
        </h3>
    </div>

@endforelse

</div>
    </div>
</section>
<!-- end product Area -->




@endsection