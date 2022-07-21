@extends('front.index')

@section('content')
    <section class="sub-header pos-relative" id="subHeader">
      <div class="container-fluid p-0 bg-fx-img cover" style="background-image:url({{ asset($item->images->first()->image) }})">
        <div class="container text-center pos-relative zi-3 pt-5 pb-5">
          <div class="w-100 d-block mt-5">
            <h1 class="white-text f-bolder text-uppercase f-w-700 f-big main-title">
                <span class="d-inline-block animate__animated animate__slideInUp">{{ $item->title }}</span>
            </h1>
          </div>
          <div class="w-100 d-block breadcrumbs mt-3 mb-5">
            <div class="wrapper">
                <a class="white-text main-hover d-inline-block f-normal" href="{{ route('index') }}">{{ trans('front.home') }}</a>
                <span class="me-2 ms-2 white-text pos-relative zi-3 normal">|</span>
                <a class="white-text main-hover d-inline-block f-normal" href="#">{{ $item->title }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="item-details pos-relative pt-5 pb-5" id="itemDetails">
      <div class="container pos-relative zi-5 pt-5 mt-5">
        <div class="row">
          <div class="col-lg-7 col-12">
                <div class="row">
                        @foreach ($item->images as $image)
                        <div class="col-lg-4">
                            <div class="w-100 d-block zoomImage">
                                <a class="zoom d-block w-100 img pos-relative radius-15 over-hidden" href="{{ asset($image->image) }}">
                                    <img class="w-100" src="{{ asset($image->image) }}">
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            <h2 class="title f-extramedium f-w-700 black-text mt-4">
               {{ $item->title }}
            </h2>
            <div class="main-heading mb-3 pb-3 mt-5 def-border-bottom">
                <h5 class="f-medium f-w-500 black-text">
                    <span class="d-inline-block me-3">
                        <i class="far fa-file"></i>
                    </span>
                    <span class="d-inline-block">{{ trans('front.item_details') }}</span>
                </h5>
            </div>
            <div class="description f-semimedium f-w-500 font-text">
              {!! $item->description !!}
            </div>
          </div>
          <div class="col-lg-5 col-12 owner-details text-center">
            <div class="w-100 d-block wrapper ps-lg-3 pe-lg-3">
              <div class="main-heading mb-3 pb-3 mt-lg-0 mt-5 def-border-bottom">
                <h5 class="f-medium f-w-500 black-text">
                    <span class="d-inline-block me-3">
                        <i class="far fa-user"></i>
                    </span>
                    <span class="d-inline-block">{{ trans('front.donor_details') }}</span>
                </h5>
              </div>
              <div class="description f-semimedium">
                <div class="w-100h5 name f-extramedium f-w-700 black-text">{{ $item->user->name }}</div>
                <div class="w-100 item-country f-normal mt-3 f-w-500">
                    <span class="d-inline-block me-2">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <span class="dis-inline-block">
                        {{ print_address($item) }}
                    </span>
                </div>
                <div class="w-100 contact-buttons mt-4">
                    <a class="w-100 butn main-butn mb-3" href="tel:{{ $item->user->mobile }}">
                        <span class="d-inline-block me-2">
                            <i class="fas fa-phone"></i>
                        </span>
                        <span class="d-inline-block">{{ trans('front.call') }}</span>
                    </a>
                    @if($item->user->email)
                    <a class="w-100 butn black-butn bordered" href="mailto:{{ $item->user->email }}">
                        <span class="d-inline-block me-2">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="d-inline-block">{{ trans('front.send_msg') }}</span>
                    </a>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="more-items pos-relative" id="moreItems">
      <div class="container pos-relative zi-5 pt-5 pb-5 mt-5 def-border-top">
        <div class="row ailgn-items-center">
          <div class="col-lg-6 col-12">
            <div class="main-heading">
              <h2 class="f-extramedium f-w-700">
                  <span class="d-inline-block me-3 main-text">
                      <i class="fas fa-th-large"></i>
                    </span>
                    <span class="d-inline-block">{{ trans('front.similar_items') }}</span>
                </h2>
            </div>
          </div>
          <div class="col-lg-6 col-12 text-lg-end mt-lg-0 mt-4">
              <a class="f-normal f-w-700 black-text main-hover" href="{{ route('index') }}#mainItems">{{ trans('front.show_all') }}</a>
            </div>
        </div>
        <div class="row mt-5">
            @foreach (similar_items($item) as $_item)
            <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
                <div class="wrapper w-100 row ms-0 me-0">
                <a class="img over-hidden col-12 m-0 p-0 square-responsive" href="{{ route('item.id', $_item->id) }}" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img">
                    <img class="w-100 trans" src="{{ asset($_item->images->first()->image) }}" alt="{{ $_item->title }}">
                </a>
                <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                    <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3">
                    <a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="{{ route('item.id', $_item->id) }}">
                        {{ $_item->title }}
                    </a>
                    <div class="item-country f-normal mt-3 f-w-500">
                        <span class="d-inline-block me-2">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="dis-inline-block">
                            {{ print_address($_item) }}
                        </span>
                    </div>
                    <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                        <div class="col-md-8 col-12 action-buttons p-0">
                        <a class="butn black-butn circle-butn phone" href="tel:{{ $_item->user->mobile }}" data-bs-toggle="tooltip" title="{{ trans('front.click_to_call') }}">
                            <i class="fas fa-phone"></i>
                        </a>
                        <a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:{{ $_item->user->email }}" data-bs-toggle="tooltip" title="{{ trans('front.click_to_email') }}">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                        <div class="item-country f-normal mt-lg-0 mt-3 f-w-500">
                            <span class="d-inline-block me-2">
                                <i class="fas fa-tag"></i>
                            </span>
                            <span class="dis-inline-block">{{ print_value($_item->category, 'name') }}</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
        </div>
      </div>
    </section>

@endsection
