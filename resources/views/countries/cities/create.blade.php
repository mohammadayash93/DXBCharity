@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add City')

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
					 <form action="{{ route('city.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                    <label for="nome">Country</label>
                                    <select name="country_id" class="form-control"  data-placeholder="Country" required="true">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
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
                                <div class="form-group {{ $errors->has('ar_name') ? 'has-error' : '' }}">
                                    <label for="nome">Arabic Name</label>
                                    <input type="text" name="ar_name" class="form-control" maxlength="30" minlength="4" placeholder="Arabic Name" required="" value="{{ old('ar_name') }}" autofocus>
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
                                    <input type="text" name="name" class="form-control" maxlength="30" minlength="4" placeholder="Name" required="" value="{{ old('name') }}" autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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

    </script>

@endsection
