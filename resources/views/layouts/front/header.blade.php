<!DOCTYPE html>
<html lang="{{ get_locale() }}" @if(get_locale() == 'ar') dir="rtl" @else dir="ltr" @endif>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#3DB54A">
    <meta name="keywords" content="تبرعات">
    <meta name="description" content="DXB Charity">
    <title>DXB Charity</title>
    <link type="text/css" rel="stylesheet"  href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    @if(get_locale() == 'ar')
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.rtl.min.css') }}">
    @endif
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/all.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/animate.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/lightgallery.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/select2.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}">
    @if(get_locale() == 'ar')
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/front/css/rtl.css') }}">
    @endif
    <link rel="shortcut icon" href="{{ asset('assets/front/imgs/icon.ico') }}">
  </head>
  <body>
    <div style="position:fixed;top:0px;left:0px;width:0;height:0;" id="scrollzipPoint"></div>
    <div class="popup-container">
      <div class="w-100 popup" id="popupVid">
        <div class="d-inline-block zi-9 pos-absolute main-bg" style="width: 40px; height: 40px;">
          <div class="d-block close-menu close-menu-icon mb-5 close-view-butn f-normal" style="right:auto; left:auto;">
            <span class="ico d-block"></span>
        </div>
        </div>
        <div class="content w-100 h-100 animate__animated animate__fadeIn"></div>
      </div>
    </div>
    <div class="top-menu black-bg full-menu animate__animated animate__fadeInUp" id="mainTopMenu">
      <div class="w-100 wrap mt-5">
        <div class="d-block close-menu close-menu-icon mb-5 pb-5 f-normal"><span></span></div>
        <div class="d-block ps-lg-5 pe-lg-5 pt-2 pb-2 ps-5 pe-5">
          <div class="row">
            <div class="col-12">
                <a class="menu-link d-block pt-3 pb-3 ps-4 pe-4 txt-capitalize f-light h5 mb-lg-3 mb-1" href="{{ route('index') }}"  title="{{ trans('front.home') }}">
                    <span>{{ trans('front.home') }}</span>
                </a>
                @foreach (get_menu_pages() as $page)
                    <a class="menu-link d-block pt-3 pb-3 ps-4 pe-4 txt-capitalize f-light h5 mb-lg-3 mb-1" href="{{ route('page.slug', $page->slug) }}"  title="{{ print_value($page, 'name') }}">
                        <span>{{ print_value($page, 'name') }}</span>
                    </a>
                @endforeach
                <a class="menu-link d-block pt-3 pb-3 ps-4 pe-4 txt-capitalize f-light h5 mb-lg-3 mb-1" href="{{ route('front.contact', get_contact()->slug) }}"  title="{{ print_value(get_contact(), 'name') }}">
                    <span>{{ print_value(get_contact(), 'name') }}</span>
                </a>
                @if(get_locale()=='ar')
                <a class="menu-link d-block pt-3 pb-3 ps-4 pe-4 txt-capitalize f-light h5 mb-lg-3 mb-1" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"  title="English">
                    <span>English</span>
                </a>
                @else
                <a class="menu-link d-block pt-3 pb-3 ps-4 pe-4 txt-capitalize f-light h5 mb-lg-3 mb-1" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"  title="عربي">
                    <span>عربي</span>
                </a>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid zi-5 top-bar pos-relative" id="topBar">
        <div class="container  pt-2 pb-2">
          <div class="row align-items-center">
            <div class="col-lg-3 col-6">
                <a class="logo" href="{{ route('index') }}">
                    <img class="animate__animated animate__fadeInRight duration_2s" src="{{ asset('assets/front/imgs/logo.png') }}" alt="DXB Charity">
                </a>
            </div>
            <div class="col-lg-9 col-6 text-end">
              <div class="d-inline-block m-auto trans top-links">
                <div class="links nav align-items-center animate__animated animate__fadeInLeft duration_2s m-auto">
                    <a class="nav-link d-lg-inline-block d-none" href="{{ route('index') }}">
                        <span class="d-inline-block">{{ trans('front.home') }}</span>
                    </a>
                    @foreach (get_menu_pages() as $page)
                        <a class="nav-link d-lg-inline-block d-none" href="{{ route('page.slug', $page->slug) }}">
                            <span class="d-inline-block">{{ print_value($page, 'name') }}</span>
                        </a>
                    @endforeach
                    <a class="nav-link d-lg-inline-block d-none" href="{{ route('front.contact', get_contact()->slug) }}">
                        <span class="d-inline-block">{{ print_value(get_contact(), 'name') }}</span>
                    </a>
                    @if(get_locale() == 'ar')
                    <a class="nav-link d-lg-inline-block d-none" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                        <span class="d-inline-block">English</span>
                    </a>
                    @else
                    <a class="nav-link d-lg-inline-block d-none" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                        <span class="d-inline-block">عربي</span>
                    </a>
                    @endif
                    <a class="butn red-butn f-semimedium not ms-2 pt-2 pb-2" href="{{ route('donate') }}">
                        <span class="d-lg-inline-block d-none me-2">
                            <i class="fas fa-heart">     </i>
                        </span>
                        <span class="d-inline-block">{{ trans('front.donate') }}</span>
                    </a>
                  <div class="mouse nav-link f-medium d-lg-none d-inline-block open-menu" data-target="#mainTopMenu">
                      <span class="d-inline-block">
                          <i class="fas fa-grip-vertical"></i>
                        </span>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
