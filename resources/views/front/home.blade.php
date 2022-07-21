@extends('front.index')

@section('content')

<section class="main-header pos-relative" id="mainHeader">
    <div class="container-fluid p-0 bg-fx-img cover" style="background-image:url({{ asset('assets/front/imgs/headers/main.jpg') }})">
      <div class="container pos-relative zi-3 pt-150 pb-150">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-12">
            <h1 class="white-text f-w-700 f-huge text-center main-title">{{ trans('front.slug') }}</h1>
          </div>
        </div>
        <div class="row p-lg-0 ps-3 pe-3">
          <div class="search-wrapper mt-5">
            <form class="w-100 row ms-0 me-0 align-items-center" method="get" action="{{ route('index') }}">
                @csrf
              <div class="col-lg-5 col-10 search-input">
                <div class="form-group w-100">
                  <input type="text" name="paginate" value="{{ $paginate }}" style="display: none" />
                  <input class="form-control w-100" type="search" name="search" placeholder="{{ trans('front.main_search') }}" value="{{ $search }}">
                  <img src="{{ asset('assets/front/imgs/icons/search.png') }}">
                </div>
              </div>
              <div class="col-lg-2 col-12">
                <select class="select2 merge-select" name="category_id">
                  <option value="">{{ trans('front.all_categories') }}</option>
                    @foreach (get_categories() as $cat)
                        <option value="{{ $cat->id }}" @if($cat->id == $category_id) selected @endif>{{ print_value($cat, 'name') }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-lg-2 col-12">
                <select class="select2 merge-select" name="country_id" id="country-dropdown">
                  <option>{{ trans('front.country') }}</option>
                  @foreach (get_countries() as $country)
                        <option value="{{ $country->id }}" @if($country->id == $country_id) selected @endif>{{ print_value($country, 'name') }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-lg-2 col-12">
                <select class="select2 merge-select" name="city_id" id="city-dropdown">
                  <option>{{ trans('front.city') }}</option>
                  @foreach (get_cities_by_country_id(1) as $city)
                        <option value="{{ $city->id }}" @if($city->id == $city_id) selected @endif>{{ print_value($city, 'name') }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-lg-1 col-12 search-button text-lg-end">
                <button class="not" type="submit"><span class="d-lg-none d-inline-block">{{ trans('front.search') }} </span><span class="d-lg-inline-block d-none"><i class="fas fa-arrow-right"></i></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="main-items pos-relative pt-5 pb-5" id="mainItems">
    <div class="container pos-relative zi-3">
      <div class="row align-items-lg-center">
        <div class="col-lg-8 col-12">
          <div class="main-heading">
            <h2 class="f-extramedium f-w-700">
                <span class="d-inline-block me-3 main-text">
                    <i class="fas fa-th-large"> </i>
                </span>
                <span class="d-inline-block">{{ trans('front.available_items') }}</span>
            </h2>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="row ms-0 me-0 filters">
            <div class="col-xl-6 col-lg-6 col-12 mb-lg-0 mb-3">
            <form id="paginate-form" style="display:none" action="{{ route('index') }}" method="get">
                @csrf
                <input id="paginate-val" type="text" name="paginate" value="" />
                <input  type="text" name="search" value="{{ $search }}" />
                <input  type="text" name="category_id" value="{{ $category_id }}" />
                <input  type="text" name="country_id" value="{{ $country_id }}" />
                <input  type="text" name="city_id" value="{{ $city_id }}" />

            </form>
              <label class="mb-2 f-w-500 f-normal">{{ trans('front.show_in_page') }}</label>
              <select class="select2 grey-select" id="paginate-select">
                <option value="15" @if($paginate == 15) selected @endif> 15 </option>
                <option value="30" @if($paginate == 30) selected @endif> 30 </option>
                <option value="45" @if($paginate == 45) selected @endif> 45 </option>
                <option value="60" @if($paginate == 60) selected @endif> 60 </option>
                <option value="75" @if($paginate == 75) selected @endif> 75 </option>
              </select>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 mb-lg-0 mb-3 text-lg-end">
              <label class="mb-2 f-w-500 f-normal text-lg-start">{{ trans('front.view_as') }}</label>
              <div class="w-100 view-buttons">
                <span class="d-inline-block f-extramedium main-text font-text me-3 mouse red-hover items-view" data-view="cols-view">
                    <i class="fas fa-th"></i>
                </span>
                <span class="d-inline-block f-extramedium font-text mouse red-hover items-view" data-view="rows-view">
                    <i class="fas fa-list"></i>
                </span>
            </div>
            </div>
          </div>
        </div>
      </div>
    <div class="row mt-5">
        @if(count($items) > 0)
        @foreach ($items as $item)
            <div class="col-lg-4 col-md-6 col-12 item" data-cols-view="col-lg-4 col-md-6 col-12 item" data-rows-view="col-12 item">
                <div class="wrapper w-100 row ms-0 me-0">
                <a class="img over-hidden col-12 m-0 p-0 square-responsive" href="{{ route('item.id', $item->id) }}" data-cols-view="col-12 m-0 p-0 over-hidden square-responsive img" data-rows-view="col-xl-2 col-lg-3 col-md-4 col-12 over-hidden square-responsive img">
                    <img class="w-100 trans" src="{{ asset($item->images->first()->image) }}" alt="{{ $item->title }}">
                </a>
                <div class="col-12 m-0 p-0 cont" data-cols-view="col-12 m-0 p-0 cont" data-rows-view="col-xl-10 col-lg-9 col-md-6 col-12 cont">
                    <div class="w-100 cont-wrapper p-3 def-border" data-cols-view="w-100 cont-wrapper p-3 def-border" data-rows-view="w-100 cont-wrapper p-3">
                    <a class="d-block item-title f-medium f-w-500 black-text main-hover trans" href="{{ route('item.id', $item->id) }}">
                        {{ $item->title }}
                    </a>
                    <div class="item-country f-normal mt-3 f-w-500">
                        <span class="d-inline-block me-2">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="dis-inline-block">
                            {{ print_address($item) }}
                        </span>
                    </div>
                    <div class="item-actions row ms-0 me-0 align-items-lg-center mt-3">
                        <div class="col-md-8 col-12 action-buttons p-0">
                        <a class="butn black-butn circle-butn phone" href="tel:{{ $item->user->mobile }}" data-bs-toggle="tooltip" title="{{ trans('front.click_to_call') }}">
                            <i class="fas fa-phone"></i>
                        </a>
                        <a class="butn black-butn circle-butn bordered ms-3 email" href="mailto:{{ $item->user->email }}" data-bs-toggle="tooltip" title="{{ trans('front.click_to_email') }}">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                    <div class="col-md-4 col-12 text-lg-end p-0">
                        <div class="item-country f-normal mt-lg-0 mt-3 f-w-500">
                            <span class="d-inline-block me-2">
                                <i class="fas fa-tag"></i>
                            </span>
                            <span class="dis-inline-block">{{ print_value($item->category, 'name') }}</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="head-links h5"><span>  {{ trans('front.no_items_found') }}</span></div>
        @endif
    </div>
    {{$items->appends($_GET)->links('vendor.pagination.custom')}}
  </section>

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            // $('.summernote').summernote({
            //     height: 200
            // });

            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url:"{{route('city.get_by_country')}}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType : 'json',
                    success: function(result){
                        if(result.cities.length > 0){
                            @if(get_locale() == 'ar')
                            $('#city-dropdown').html('<option value="">كل المدن</option>');
                            @else
                            $('#city-dropdown').html('<option value="">All Cities</option>');
                            @endif
                            $.each(result.cities,function(key,value){
                                @if(get_locale() == 'ar')
                                    $("#city-dropdown").append('<option value="'+value.id+'">'+value.ar_name+'</option>');
                                @else
                                    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                                @endif
                            });
                        }else{
                            @if(get_locale() == 'ar')
                                $('#city-dropdown').html('<option value="">اختر البلد أولاً</option>');
                            @else
                            $('#city-dropdown').html('<option value="">Select Country First</option>');
                            @endif
                        }
                    }
                });
            });

            $('#paginate-select').on('change', function() {
                var paginate = this.value;
                $('#paginate-val').val(paginate);
                $('#paginate-form').submit();
            });
        });
    </script>

@endsection
