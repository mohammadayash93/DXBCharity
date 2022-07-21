<footer class="pos-relative main-footer pb-3 black-bg white-text" id="mainFooter">
    <div class="container pt-5 pt-4 pos-relative zi-4">
      <div class="row align-items-center contact">
        <div class="col-xl-2 offset-xl-0 col-lg-2 offset-lg-0 col-8 offset-2">
            <a class="foot-logo" href="{{ route('index') }}">
                <img class="w-100" src="{{ asset('assets/front/imgs/logo-white.png') }}" alt="DXB Charity">
            </a>
        </div>
        <div class="col-xl-7 col-lg-6 col-12 foot-links text-lg-end text-center mt-lg-0 mt-4 mb-lg-0 mb-4">
            <a class="nav-link d-inline-block txt-uppercase f-normal f-w-700" href="{{ route('index') }}"  title="{{ trans('front.home') }}">
                <span class="d-inline-block">{{ trans('front.home') }}</span>
            </a>
            @foreach (get_menu_pages() as $page)
            <a class="nav-link d-inline-block txt-uppercase f-normal f-w-700" href="{{ route('page.slug', $page->slug) }}"  title="{{ print_value($page, 'name') }}">
                <span class="d-inline-block">{{ print_value($page, 'name') }}</span>
            </a>
            @endforeach
            <a class="nav-link d-inline-block txt-uppercase f-normal f-w-700" href="{{ route('front.contact', get_contact()->slug) }}"  title="{{ print_value(get_contact(), 'name') }}">
                <span class="d-inline-block">{{ print_value(get_contact(), 'name') }}</span>
            </a>
            @if(get_locale() == 'ar')
            <a class="nav-link d-inline-block txt-uppercase f-normal f-w-700" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"  title="English">
                <span class="d-inline-block">English</span>
            </a>
            @else
            <a class="nav-link d-inline-block txt-uppercase f-normal f-w-700" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"  title="عربي">
                <span class="d-inline-block">عربي</span>
            </a>
            @endif
        </div>
        <div class="col-xl-3 col-lg-4 col-12 info text-lg-end text-center mb-lg-0 mb-4">
            <a class="butn main-butn f-semimedium ms-2 pt-2 pb-2" href="{{ route('donate') }}">
                <span class="d-inline-block me-2">
                    <i class="fas fa-heart">     </i>
                </span>
                <span class="d-inline-block">{{ trans('front.donate') }}  </span>
            </a>
            <a class="butn white-butn circle-butn bordered ms-3 email" href="#topBar" data-bs-toggle="tooltip" title="{{ trans('front.go_to_top') }}">
                <i class="fas fa-arrow-up"></i>
            </a>
        </div>
        <div class="col-lg-6 col-12 mt-lg-5 text-lg-start text-center">
          <div class="d-inline-block f-small mb-lg-0 mb-1">
              <span>{{ trans('front.all_rights') }}</span>
              <span class="eng-title"> {{ now()->year }}</span>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-lg-5 text-lg-end text-center">
          <div class="d-inline-block f-small mb-lg-0 mb-1">
              <span class="me-1">{{ trans('front.designed') }}</span>
              <span class="main-text me-1 ms-1">
                  <i class="fas fa-heart"></i>
                </span>
              <span class="me-1">{{ trans('front.by') }} </span> <a href="https://www.linkedin.com/in/mohammad-ayash-52b9b3129/" target="_blank"> Mohammad Ayash </a>
            </div>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/aos.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/fontawesome.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/lightgallery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/lg-thumbnail.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/select2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
  @if(get_locale() == 'ar')
    <script type="text/javascript" src="{{ asset('assets/front/js/rtl.js')}}"></script>
  @else
    <script type="text/javascript" src="{{ asset('assets/front/js/ltr.js')}}"></script>
  @endif
  @yield('scripts')
</body>
</html>
