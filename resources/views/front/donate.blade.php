@extends('front.index')
@section('content')
    <section class="sub-header pos-relative" id="subHeader">
        <div class="container-fluid p-0 bg-fx-img cover" style="background-image:url({{ asset('assets/front/imgs/headers/donate.jpg') }})">
            <div class="container text-center pos-relative zi-3 pt-150 pb-150">
                <div class="w-100 d-block mt-5">
                    <h1 class="white-text f-bolder text-uppercase f-w-700 f-extrabig main-title">
                        <span class="d-inline-block animate__animated animate__slideInUp">{{ trans('front.donate_title') }}</span>
                    </h1>
                </div>
                <div class="w-100 d-block breadcrumbs mt-3 mb-5">
                    <div class="wrapper">
                        <div class="white-text d-block f-extramedium f-w-500">{{ trans('front.donate_sub_title') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sub-donate pos-relative white-bg pt-5 pb-5" id="subDonate">
        <div class="container pos-relative zi-5">
            <div class="row donate-steps pt-5">
                <div class="col-lg-4 col-12">
                    <div class="w-100 donate-step d-block pos-relative pt-5 pb-5 ps-lg-5 pe-lg-5 ps-4 pe-4 def-border grey-bg radius-15 text-center">
                        <div class="step-num f-big f-w-700">1</div>
                        <div class="step-icon mb-3">
                            <img class="w-100" src="{{ asset('assets/front/imgs/donate/1.png') }}" alt="{{ trans('front.step_1_title') }}">
                        </div>
                        <div class="step-title">
                            <div class="h2 f-medium f-w-700 main-text d-block mb-2">{{ trans('front.step_1_title') }}</div>
                        </div>
                        <div class="step-desc">
                            <div class="h3 f-semimedium f-w-500 font-text d-block">{{ trans('front.step_1_desc') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="w-100 donate-step d-block pos-relative pt-5 pb-5 ps-lg-5 pe-lg-5 ps-4 pe-4 def-border grey-bg radius-15 text-center">
                        <div class="step-num f-big f-w-700">2</div>
                        <div class="step-icon mb-3">
                            <img class="w-100" src="{{ asset('assets/front/imgs/donate/2.png') }}" alt="{{ trans('front.step_2_title') }}">
                        </div>
                        <div class="step-title">
                            <div class="h2 f-medium f-w-700 main-text d-block mb-2">{{ trans('front.step_2_title') }}</div>
                        </div>
                        <div class="step-desc">
                            <div class="h3 f-semimedium f-w-500 font-text d-block">{{ trans('front.step_2_desc') }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="w-100 donate-step d-block pos-relative pt-5 pb-5 ps-lg-5 pe-lg-5 ps-4 pe-4 def-border grey-bg radius-15 text-center">
                        <div class="step-num f-big f-w-700">3</div>
                        <div class="step-icon mb-3">
                            <img class="w-100" src="{{ asset('assets/front/imgs/donate/3.png') }}" alt="{{ trans('front.step_3_title') }}">
                        </div>
                        <div class="step-title">
                            <div class="h2 f-medium f-w-700 main-text d-block mb-2">{{ trans('front.step_3_title') }}</div>
                        </div>
                        <div class="step-desc">
                            <div class="h3 f-semimedium f-w-500 font-text d-block">{{ trans('front.step_3_desc') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pos-relative zi-5 pt-5 mt-5" id="donate-form">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 pos-relative">
                    <div class="w-100 text-center mb-5">
                        <div class="main-heading">
                            <h2 class="f-extramedium f-w-700">
                                <span class="d-inline-block me-3 main-text">
                                    <i class="fas fa-list"></i>
                                </span>
                                <span class="d-inline-block">{{ trans('front.donate_form_title') }}</span>
                            </h2>
                            <h3 class="f-semimedium f-w-500 font-text mt-3">{{ trans('front.donate_form_desc') }}</h3>
                        </div>
                    </div>
                    <div class="w-100 contact-form">
                        @if(Session::has('flash_message'))
                            <div class="alert {{ Session::get('flash_message')['class'] }}" style="padding: 10px 20px;" id="flash_message">
                                <div style="color: #fff; display: inline-block; margin-right: 10px;">
                                    {!! Session::get('flash_message')['msg'] !!}
                                </div>
                            </div>
                        @endif
                        <form class="w-100 row ms-0 me-0" method="POST" action="{{ route('donate.new') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 text-center">
                                <div class="main-heading mb-5 pb-3 mt-4 def-border-bottom">
                                    <h4 class="f-medium f-w-500 black-text">
                                        <span class="d-inline-block me-3"><i class="far fa-square"></i></span>
                                        <span class="d-inline-block">{{ trans('front.item_details') }}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <div class="w-100 d-block black-text txt-center upload-area m-0" id="upload-area">
                                    <input type="file" name="files[]" accept="image/*" multiple required>
                                    <div class="icon-area d-flex align-items-lg-center text-center">
                                        <div class="w-100 mt-3 mb-3 text-center f-big f-bold main-text up-drop-here">{{ trans('front.drop_here') }}</div>
                                        <div class="d-lg-inline-block d-block txt-lg-left">
                                            <div class="w-100 mt-3 mb-3 f-small up-drag">
                                                <span class="d-lg-inline-block d-none">{{ trans('front.drag_image') }}</span>
                                            </div>
                                            <div class="w-100 mt-3 mb-3 f-small up-drag">
                                                <span class="d-lg-inline-block d-none">{{ trans('front.or') }}</span>
                                                <span class="d-lg-inline-block d-none main-text">{{ trans('front.choose_image') }}</span>
                                                <span class="d-lg-inline-block d-none">{{trans('front.max_size')}}</span>
                                            </div>
                                        </div>
                                        <div class="d-lg-inline-block d-block">
                                            <div class="up-butns">
                                                <button class="butn black-butn bordered f-small ms-3" type="submit">
                                                    <span class="me-2"><i class="fas fa-image not"></i></span>
                                                    <span>{{ trans('front.choose_') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="error">
                                            <span class="red-text f-bold">{{ trans('front.error_image') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 files"></div>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.item_name') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <input class="form-control grey" name="title" type="text" placeholder="{{ trans('front.item_placeholder') }}" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3 filters">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.category') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <select class="select2 grey-select form-control" name="category_id" required>
                                    @foreach (get_categories() as $cat)
                                        <option value="{{ $cat->id }}" @if(old('category_id') == $cat->id) selected @endif>{{ print_value($cat ,'name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.item_desc') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <textarea class="form-control grey" name="description" rows="8" placeholder="{{ trans('front.item_desc_placeholder') }}" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="col-12 text-center">
                                <div class="main-heading mb-5 pb-3 mt-4 def-border-bottom">
                                    <h4 class="f-medium f-w-500 black-text">
                                        <span class="d-inline-block me-3">
                                            <i class="far fa-user"></i>
                                        </span>
                                        <span class="d-inline-block">{{ trans('front.donor_details') }}</span>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.donor_name') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <input class="form-control grey" name="donor_name" value="{{ old('donor_name') }}" type="text" placeholder="{{ trans('front.donor_placeholder') }}" required>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.mobile') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <input class="form-control grey" type="tel" name="mobile" value="{{ old('mobile') }}" placeholder="{{ trans('front.mobile_placeholder') }}" required>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.email') }}</span>
                                </label>
                                <input class="form-control grey" type="email" name="email" value="{{ old('email') }}" placeholder="{{ trans('front.email_placeholder') }}">
                            </div>
                            <div class="col-lg-6 col-12 form-group mb-3 filters">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.country') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <select class="select2 grey-select form-control" name="country_id" id="country-dropdown" required>
                                    @foreach (get_countries() as $country)
                                        <option value="{{ $country->id }}">{{ print_value($country, 'name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-12 form-group mb-3 filters">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.city') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <select class="select2 grey-select form-control" name="city_id" id="city-dropdown" required>
                                    @foreach (get_cities_by_country_id(1) as $city)
                                        <option value="{{ $city->id }}">{{ print_value($city, 'name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 col-12 form-group mb-3">
                                <label class="f-normal font-text f-w-500 mb-2">
                                    <span>{{ trans('front.address') }}</span><span class="red-text ms-2">*</span>
                                </label>
                                <input class="form-control grey" name="address" value="{{ old('address') }}" type="text" placeholder="{{ trans('front.address_placeholder') }}" required>
                            </div>
                            <div class="col-lg-12 col-12 mt-3">
                                <button class="butn main-butn w-100" type="submit">
                                    <span class="me-2"> <i class="fas fa-paper-plane"></i></span>
                                    <span>{{ trans('front.donate_now') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                            $('#city-dropdown').html('<option value="">اختر المدينة</option>');
                            @else
                            $('#city-dropdown').html('<option value="">Select City</option>');
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

        });
    </script>

@endsection
