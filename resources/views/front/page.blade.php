@extends('front.index')

@section('content')

    <section class="sub-header pos-relative" id="subHeader">
      <div class="container-fluid p-0 bg-fx-img cover" style="background-image:url({{ asset($page->image) }})">
        <div class="container text-center pos-relative zi-3 pt-5 pb-5">
          <div class="w-100 d-block mt-5">
            <h1 class="white-text f-bolder text-uppercase f-w-700 f-big main-title">
                <span class="d-inline-block animate__animated animate__slideInUp">{{ print_value($page, 'name') }}</span>
            </h1>
          </div>
          <div class="w-100 d-block breadcrumbs mt-3 mb-5">
            <div class="wrapper">
                <a class="white-text main-hover d-inline-block f-normal" href="{{ route('index') }}">{{ trans('front.home') }}</a>
                <span class="me-2 ms-2 white-text pos-relative zi-3 normal">|</span>
                <a class="white-text main-hover d-inline-block f-normal" href="#">{{ print_value($page, 'name') }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sub-about pos-relative white-bg pt-5 pb-5" id="subAbout">
      <div class="container pos-relative zi-5 pt-5">
        <div class="row">
          <div class="col-12">
            <div class="description f-semimedium f-w-500 font-text">
            {!! print_value($page, 'description') !!}
            </div>
          </div>
        </div>
      </div>
    </section>
   @endsection
