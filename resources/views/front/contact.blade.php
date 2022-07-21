@extends('front.index')

@section('content')
    <section class="sub-header pos-relative" id="subHeader">
      <div class="container-fluid p-0 bg-fx-img cover" style="background-image:url('{{ asset($contact->image) }}')">
        <div class="container text-center pos-relative zi-3 pt-5 pb-5">
          <div class="w-100 d-block mt-5">
            <h1 class="white-text f-bolder text-uppercase f-w-700 f-big main-title"><span class="d-inline-block animate__animated animate__slideInUp">{{ print_value($contact, 'name') }}</span></h1>
          </div>
          <div class="w-100 d-block breadcrumbs mt-3 mb-5">
            <div class="wrapper"><a class="white-text main-hover d-inline-block f-normal" href="{{ route('index') }}">{{ trans('front.home') }}</a><span class="me-2 ms-2 white-text pos-relative zi-3 normal">|</span><a class="white-text main-hover d-inline-block f-normal" href="#">تواصل معنا</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sub-contact pos-relative white-bg pt-5 pb-5" id="subContact">
      <div class="container pos-relative zi-5 pt-5">
        <div class="row">
          <div class="col-12 mb-5">
            <div class="description f-semimedium f-w-500 font-text">
                {!! print_value($contact, 'description') !!}
            </div>
          </div>
          <div class="col-lg-6 col-12 contact-info mb-3">
            <div class="w-100 contact-item row me-0 ms-0 def-border grey-bg radius-15 p-4 align-items-lg-center">
              <div class="col-md-9 col-12">
                <div class="cont d-inline-block">
                  <div class="d-block f-semimedium f-w-500 black-text mb-1">{{ trans('front.mobile') }}</div>
                  <a class="font-text main-hover d-block info f-w-700 f-medium" href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a>
                </div>
              </div>
              <div class="col-md-3 col-12 text-md-end">
                  <a class="butn black-butn circle-butn phone" href="tel:{{ $contact->mobile }}" data-bs-toggle="tooltip" title="{{ trans('front.click_to_call') }}">
                       <i class="fas fa-phone"></i>
                  </a>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 contact-info mb-3">
            <div class="w-100 contact-item row me-0 ms-0 def-border grey-bg radius-15 p-4 align-items-lg-center">
              <div class="col-md-9 col-12">
                <div class="cont d-inline-block">
                  <div class="d-block f-semimedium f-w-500 black-text mb-1">{{ trans('front.email') }}</div>
                  <a class="font-text main-hover d-block info f-w-700 f-medium" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                </div>
              </div>
              <div class="col-md-3 col-12 text-md-end">
                  <a class="butn black-butn circle-butn phone" href="mailto:{{ $contact->email }}" data-bs-toggle="tooltip" title="{{ trans('front.click_to_email') }}">
                    <i class="fas fa-envelope"> </i>
                </a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
