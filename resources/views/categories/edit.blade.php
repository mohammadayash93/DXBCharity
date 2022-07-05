@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Category')

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
    					 <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('ar_name') ? 'has-error' : '' }}">
                                        <label for="nome">Arabic Name</label>
                                        <input type="text" name="ar_name" class="form-control"  placeholder="Arabic Name" required="" autofocus value="{{$category->ar_name}}">
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
                                        <input type="text" name="name" class="form-control"  placeholder="Name" required="" autofocus value="{{$category->name}}">
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
                                        <img src="{{ asset($category->image) }}" id="profile-img-tag" height="100" width="100">
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


        $('#customFile').change(function(){
            $('#profile-img-tag').hide();
        });
    </script>

@endsection
