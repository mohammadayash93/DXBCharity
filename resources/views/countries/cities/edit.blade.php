@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit City')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('city') }}" class="link_menu_page">
			<i class="fa fa-building-o"></i> Cities
		</a>
	</li>

@endsection

@section('content')
    <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">
    					 <form action="{{ route('city.update',$city->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                        <label for="nome">Country</label>
                                        <select name="country_id" class="form-control"  data-placeholder="Country" required="true">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            @if($country->id == $city->country_id)
                                                <option value="{{ $country->id}}" selected> {{ $country->name }} </option>
                                                @else
                                                <option value="{{ $country->id}}"> {{ $country->name }} </option>
                                                @endif
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
                                    <div class="form-group {{ $errors->has('ar_name') ? 'has-error' : '' }}">
                                        <label for="nome">Arabic Name</label>
                                        <input type="text" name="ar_name" class="form-control" maxlength="30" minlength="4" placeholder="Arabic Name" required="" autofocus value="{{$city->ar_name}}">
                                        @if($errors->has('ar_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ar_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="nome">Name</label>
                                        <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" autofocus value="{{$city->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                   <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-save"></i> Save</button>
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
                        return "No records found.";
                    }
                }
            });

            $('#icheck').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue'
            });
        });

    </script>

@endsection
