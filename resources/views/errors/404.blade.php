@extends('front.index')

@section('content')
    <section class="pos-relative 404 text-start pt-150 pb-150" id="404">
      <div class="container">
        <div class="row subHeaderContent align-items-lg-center">
          <div class="col-lg-4 offset-lg-1 col-md-5 col-12">
            <div class="w-100 img d-inline-block mb-md-0 mb-4"><img class="w-100" src="{{ asset('assets/front/imgs/404.png') }}" alt="{{ trans('front.404_title') }}"></div>
          </div>
          <div class="col-lg-6 col-md-7 col-12">
            <div class="title over-hidden">
              <div class="txt-uppercase f-extrahuge f-w-900 d-block mb-1 black-text">404</div>
              <h1 class="animate__animated animate__slideInUp f-w-700 duration_2s f-huge txt-uppercase">{{ trans('front.404_title') }}</h1>
              <div class="head-links h5">
                  <span>{{ trans('front.404_desc') }}</span>
                  <a class="d-inline-block main-text p-2" href="{{ route('index') }}">{{ trans('front.home') }}</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
