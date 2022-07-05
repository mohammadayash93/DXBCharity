@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Country')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('country') }}" class="link_menu_page">
			<i class="fa fa-globe"></i> Countries
		</a>
	</li>

@endsection

@section('content')
    <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">
    					 <form action="{{ route('country.update',$country->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('ar_name') ? 'has-error' : '' }}">
                                        <label for="nome">Arabic Name</label>
                                        <input type="text" name="ar_name" class="form-control" maxlength="30" minlength="4" placeholder="Arabic Name" required="" autofocus value="{{$country->ar_name}}">
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
                                        <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" autofocus value="{{$country->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('iso2') ? 'has-error' : '' }}">
                                        <label for="nome">ISO2</label>
                                        <input type="text" name="iso2" class="form-control" maxlength="2" minlength="2" placeholder="ISO2" required="" autofocus value="{{$country->iso2}}">
                                        @if($errors->has('iso2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('iso2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('iso3') ? 'has-error' : '' }}">
                                        <label for="nome">ISO3</label>
                                        <input type="text" name="iso3" class="form-control" maxlength="3" minlength="3" placeholder="ISO3" required="" autofocus value="{{$country->iso3}}">
                                        @if($errors->has('iso3'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('iso3') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('phonecode') ? 'has-error' : '' }}">
                                        <label for="nome">Phone Code</label>
                                        <input type="text" name="phonecode" class="form-control" maxlength="5" minlength="1" placeholder="Phone Code" required="" autofocus value="{{$country->phonecode}}">
                                        @if($errors->has('phonecode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phonecode') }}</strong>
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
