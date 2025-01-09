@extends('front_end.layouts.app')
@section('page-title')
    {{ __('Products') }}
@endsection
@php

@endphp

@section('content')
    @include('front_end.sections.partision.header_section')
        <section class="common-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="common-banner-content">
                            <a href="{{ route('landing_page', $slug) }}" class="back-btn">
                                <span class="svg-ic">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                                {!! $page_json->collection_page->section->button->text ??  __('Back to category') !!}
                            </a>
                            <div class="section-title">
                                <h2> {!! $page_json->collection_page->section->title->text ??  __('Shopping Category') !!} <span>({{$product_count ?? 0 }})</span></h2>
                            </div>
                            <p> {!! $page_json->collection_page->section->description->text ?? __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-listing-section padding-bottom">
            <div class="product-heading-row">
                <div class="container">
                @include('front_end.common.product.filter_head')
                </div>
            </div>

            <div class="container">
                @include('front_end.common.product.filter')
            </div>
        </section>
        @include('front_end.hooks.product_list')
        @include('front_end.sections.homepage.product_category_section')


        @include('front_end.sections.homepage.subscribe_section')

    @include('front_end.sections.partision.footer_section')
@endsection

