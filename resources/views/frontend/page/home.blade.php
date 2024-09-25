@extends('layouts.font')
@push('styles')
    <style>
        .details,.whichlist{
            font-size: 20px !important;
        }
        .whichlist:hover{
            color:red;
        }
        .details:hover{
            color:red;
        }
        .whichlist_all{
            justify-content: space-between;
        }
    </style>
@endpush
@section('title')
    Home
@endsection
@section('content')

<!-- start Hero Area -->
@include('frontend.page.home-section.hero-area')
<!-- end Hero Area -->

<!-- Start Featured Categories Area -->
@include('frontend.page.home-section.featured-categories')
<!-- End Features Area -->

<!-- Start Trending Product Area -->
@include('frontend.page.home-section.trending-product')
<!-- End Trending Product Area -->

<!-- Start Call Action Area -->
@include('frontend.page.home-section.call-action')
<!-- End Call Action Area -->

<!-- Start Banner Area -->
@include('frontend.page.home-section.banner-section')
<!-- End Banner Area -->

<!-- Start Shipping Info -->
@include('frontend.page.home-section.shipping-info')

@endsection
@push('script')
    
@endpush