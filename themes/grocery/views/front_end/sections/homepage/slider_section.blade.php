<section class="home-banner-section" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    
    <div class="mian-banner-image">
        <img src="{{ get_file($section->slider->section->background_image->image ?? '', $currentTheme) }}" class="img-fluid {{ ($section->slider->section->background_image->slug ?? '').'_preview'}}" alt="main-banner">
    </div>
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="banner-main-content d-flex align-items-center">

            <div class="banner-right-side">
                <div class="banner-slider">
                    @for ($i = 0; $i < $section->slider->loop_number ?? 1; $i++)
                        <div class="home-banner-content">
                            <div class="home-banner-content-inner">
                                <div class="new-labl" id="{{ ($section->slider->section->button_second->slug ?? '').'_'. $i }}_preview">
                                    {!! $section->slider->section->button_second->text->{$i} ?? "" !!}
                                </div>
                                <h2 class="h1" id="{{ ($section->slider->section->title->slug ?? '').'_'. $i }}_preview">
                                    {!! $section->slider->section->title->text->{$i} ?? "" !!}
                                </h2>
                                <div class="desk-wrapper">
                                    <p id="{{ ($section->slider->section->description->slug ?? '').'_'. $i }}_preview">{!! ($section->slider->section->description->text->{$i} ?? '') !!}</p>
                                </div>
                                <a href="{{ route('page.product-list',  ['storeSlug' => $slug]) }}" class="btn btn-white"
                                    tabindex="0" id="{{ ($section->slider->section->button_first->slug ?? '').'_'. $i }}_preview">
                                    <span class="first-icon"><svg width="11" height="11" viewBox="0 0 11 11"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.525 7.15C8.2763 7.15 7.92491 7.18438 7.5591 7.23448C7.3882 7.25788 7.25788 7.3882 7.23448 7.5591C7.18438 7.92491 7.15 8.2763 7.15 8.525C7.15 8.7737 7.18438 9.12509 7.23448 9.4909C7.25788 9.6618 7.3882 9.79212 7.5591 9.81552C7.92491 9.86562 8.2763 9.9 8.525 9.9C8.7737 9.9 9.12509 9.86562 9.4909 9.81552C9.6618 9.79212 9.79212 9.6618 9.81552 9.4909C9.86562 9.12509 9.9 8.7737 9.9 8.525C9.9 8.2763 9.86562 7.92491 9.81552 7.5591C9.79212 7.3882 9.6618 7.25788 9.4909 7.23448C9.12509 7.18438 8.7737 7.15 8.525 7.15ZM7.40984 6.14465C6.74989 6.23503 6.23503 6.74989 6.14465 7.40984C6.09281 7.78836 6.05 8.19949 6.05 8.525C6.05 8.85051 6.09281 9.26165 6.14465 9.64016C6.23503 10.3001 6.74989 10.815 7.40984 10.9053C7.78836 10.9572 8.19949 11 8.525 11C8.85051 11 9.26165 10.9572 9.64016 10.9053C10.3001 10.815 10.815 10.3001 10.9053 9.64016C10.9572 9.26165 11 8.85051 11 8.525C11 8.19949 10.9572 7.78836 10.9053 7.40984C10.815 6.74989 10.3001 6.23503 9.64016 6.14465C9.26165 6.09281 8.85051 6.05 8.525 6.05C8.19949 6.05 7.78836 6.09281 7.40984 6.14465Z"
                                                fill="white"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.475 7.15C2.2263 7.15 1.87491 7.18438 1.5091 7.23448C1.3382 7.25788 1.20788 7.3882 1.18448 7.5591C1.13438 7.92491 1.1 8.2763 1.1 8.525C1.1 8.7737 1.13438 9.12509 1.18448 9.4909C1.20788 9.6618 1.3382 9.79212 1.5091 9.81552C1.87491 9.86562 2.2263 9.9 2.475 9.9C2.7237 9.9 3.07509 9.86562 3.4409 9.81552C3.6118 9.79212 3.74212 9.6618 3.76552 9.4909C3.81562 9.12509 3.85 8.7737 3.85 8.525C3.85 8.2763 3.81562 7.92491 3.76552 7.5591C3.74212 7.3882 3.6118 7.25788 3.4409 7.23448C3.07509 7.18438 2.7237 7.15 2.475 7.15ZM1.35984 6.14465C0.699894 6.23503 0.185033 6.74989 0.0946504 7.40984C0.0428112 7.78836 0 8.19949 0 8.525C0 8.85051 0.0428112 9.26165 0.0946504 9.64016C0.185033 10.3001 0.699894 10.815 1.35984 10.9053C1.73836 10.9572 2.14949 11 2.475 11C2.80051 11 3.21165 10.9572 3.59016 10.9053C4.25011 10.815 4.76497 10.3001 4.85535 9.64016C4.90719 9.26165 4.95 8.85051 4.95 8.525C4.95 8.19949 4.90719 7.78836 4.85535 7.40984C4.76497 6.74989 4.25011 6.23503 3.59016 6.14465C3.21165 6.09281 2.80051 6.05 2.475 6.05C2.14949 6.05 1.73836 6.09281 1.35984 6.14465Z"
                                                fill="white"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.525 1.1C8.2763 1.1 7.92491 1.13438 7.5591 1.18448C7.3882 1.20788 7.25788 1.3382 7.23448 1.5091C7.18438 1.87491 7.15 2.2263 7.15 2.475C7.15 2.7237 7.18438 3.07509 7.23448 3.4409C7.25788 3.6118 7.3882 3.74212 7.5591 3.76552C7.92491 3.81562 8.2763 3.85 8.525 3.85C8.7737 3.85 9.12509 3.81562 9.4909 3.76552C9.6618 3.74212 9.79212 3.6118 9.81552 3.4409C9.86562 3.07509 9.9 2.7237 9.9 2.475C9.9 2.2263 9.86562 1.87491 9.81552 1.5091C9.79212 1.3382 9.6618 1.20788 9.4909 1.18448C9.12509 1.13438 8.7737 1.1 8.525 1.1ZM7.40984 0.0946504C6.74989 0.185033 6.23503 0.699894 6.14465 1.35984C6.09281 1.73836 6.05 2.14949 6.05 2.475C6.05 2.80051 6.09281 3.21165 6.14465 3.59016C6.23503 4.25011 6.74989 4.76497 7.40984 4.85535C7.78836 4.90719 8.19949 4.95 8.525 4.95C8.85051 4.95 9.26165 4.90719 9.64016 4.85535C10.3001 4.76497 10.815 4.25011 10.9053 3.59016C10.9572 3.21165 11 2.80051 11 2.475C11 2.14949 10.9572 1.73836 10.9053 1.35984C10.815 0.699894 10.3001 0.185033 9.64016 0.0946504C9.26165 0.0428112 8.85051 0 8.525 0C8.19949 0 7.78836 0.0428112 7.40984 0.0946504Z"
                                                fill="white"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.475 1.1C2.2263 1.1 1.87491 1.13438 1.5091 1.18448C1.3382 1.20788 1.20788 1.3382 1.18448 1.5091C1.13438 1.87491 1.1 2.2263 1.1 2.475C1.1 2.7237 1.13438 3.07509 1.18448 3.4409C1.20788 3.6118 1.3382 3.74212 1.5091 3.76552C1.87491 3.81562 2.2263 3.85 2.475 3.85C2.7237 3.85 3.07509 3.81562 3.4409 3.76552C3.6118 3.74212 3.74212 3.6118 3.76552 3.4409C3.81562 3.07509 3.85 2.7237 3.85 2.475C3.85 2.2263 3.81562 1.87491 3.76552 1.5091C3.74212 1.3382 3.6118 1.20788 3.4409 1.18448C3.07509 1.13438 2.7237 1.1 2.475 1.1ZM1.35984 0.0946504C0.699894 0.185033 0.185033 0.699894 0.0946504 1.35984C0.0428112 1.73836 0 2.14949 0 2.475C0 2.80051 0.0428112 3.21165 0.0946504 3.59016C0.185033 4.25011 0.699894 4.76497 1.35984 4.85535C1.73836 4.90719 2.14949 4.95 2.475 4.95C2.80051 4.95 3.21165 4.90719 3.59016 4.85535C4.25011 4.76497 4.76497 4.25011 4.85535 3.59016C4.90719 3.21165 4.95 2.80051 4.95 2.475C4.95 2.14949 4.90719 1.73836 4.85535 1.35984C4.76497 0.699894 4.25011 0.185033 3.59016 0.0946504C3.21165 0.0428112 2.80051 0 2.475 0C2.14949 0 1.73836 0.0428112 1.35984 0.0946504Z"
                                                fill="white"></path>
                                        </svg></span>
                                        {{ ($section->slider->section->button_second->text->{$i} ?? '') }} <svg xmlns="http://www.w3.org/2000/svg" width="4"
                                        height="6" viewBox="0 0 4 6" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.65976 0.662719C0.446746 0.879677 0.446746 1.23143 0.65976 1.44839L2.18316 3L0.65976 4.55161C0.446747 4.76856 0.446747 5.12032 0.65976 5.33728C0.872773 5.55424 1.21814 5.55424 1.43115 5.33728L3.34024 3.39284C3.55325 3.17588 3.55325 2.82412 3.34024 2.60716L1.43115 0.662719C1.21814 0.445761 0.872773 0.445761 0.65976 0.662719Z"
                                            fill="white"></path>
                                    </svg></a>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="home-banner-nav"></div>
            </div>
        </div>
    </div>
</section>








