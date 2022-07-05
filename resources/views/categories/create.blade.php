@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Category')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('category') }}" class="link_menu_page">
			<i class="fa fa-sitemap"></i> Categories
		</a>
	</li>

@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					 <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('ar_name') ? 'has-error' : '' }}">
                                    <label for="nome">Arabic Name</label>
                                    <input type="text" name="ar_name" class="form-control" placeholder="Arabic Name" required="" value="{{ old('ar_name') }}" autofocus>
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
                                    <input type="text" name="name" class="form-control"  placeholder="Name" required="" value="{{ old('name') }}" autofocus>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <label for="nome">Image</label>
                                    <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*" autofocus>
                                    @if($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
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
