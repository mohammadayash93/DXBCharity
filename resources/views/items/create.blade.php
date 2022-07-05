@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Item')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('item') }}" class="link_menu_page">
			<i class="fa fa-database"></i> Items
		</a>
	</li>

@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					 <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                    <label for="nome">Category</label>
                                    <select name="category_id" class="form-control"  data-placeholder="Category" required="true">
                                        <option value="">Select Category</option>
                                        @foreach(get_categories() as $category)
                                            <option value="{{ $category->id}}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                                    <label for="nome">Added By</label>
                                    <select name="user_id" class="form-control"  data-placeholder="Added By" required="true">
                                        <option value="">Select User</option>
                                        @foreach(get_users() as $user)
                                            <option value="{{ $user->id}}"> {{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                    <label for="nome">Country</label>
                                    <select name="country_id" id="country-dropdown" class="form-control"  data-placeholder="Country" required="true">
                                        <option value="">Select Country</option>
                                        @foreach(get_countries() as $country)
                                            <option value="{{ $country->id}}"> {{ $country->name }} </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                                    <label for="nome">City</label>
                                    <select name="city_id" id="city-dropdown" class="form-control"  data-placeholder="City" required="true">

                                    </select>
                                    @if($errors->has('city_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="nome">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" required="" value="{{ old('address') }}" autofocus>
                                    @if($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="nome">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title" required="" value="{{ old('title') }}" autofocus>
                                    @if($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label for="nome">Description</label>
                                    <textarea class="summernote" name="description" required="" autofocus>{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                                    <label for="nome">Image</label>
                                    <input type="file" name="images[]" class="custom-file-input" id="customFile" multiple accept="image/*" autofocus>
                                    @if($errors->has('images'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('images') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('layout_js')

    <script>
        $(function(){
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "Nenhum registro encontrado.";
                    }
                }
            });
        });
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });

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
                            $('#city-dropdown').html('<option value="">Select City</option>');
                            $.each(result.cities,function(key,value){
                                $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        }else
                        $('#city-dropdown').html('<option value="">Select Country First</option>');
                    }
                });
            });

        });
    </script>

@endsection
