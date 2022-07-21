@extends('layouts.AdminLTE.index')

@section('icon_page', 'pencil')

@section('title', 'Edit Contact')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('contact') }}" class="link_menu_page">
			<i class="fa fa-address-book"></i> Contact Us
		</a>
	</li>

@endsection

@section('content')
    <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">
    					 <form action="{{ route('contact.update',$contact->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('ar_name') ? 'has-error' : '' }}">
                                        <label for="nome">Arabic Name</label>
                                        <input type="text" dir="rtl" name="ar_name" class="form-control"  placeholder="Arabic Name" required="" autofocus value="{{$contact->ar_name}}">
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
                                        <input type="text" name="name" class="form-control"  placeholder="Name" required="" autofocus value="{{$contact->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('ar_description') ? 'has-error' : '' }}">
                                        <label for="nome">Arabic Description</label>
                                        <textarea class="summernote" name="ar_description"  autofocus>{{ $contact->ar_description }}</textarea>
                                        @if($errors->has('ar_description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ar_description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="nome">Description</label>
                                        <textarea class="summernote" name="description"  autofocus>{{ $contact->description }}</textarea>
                                        @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
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
                                        <img src="{{ asset($contact->image) }}" id="profile-img-tag" height="100" width="100">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('ar_address') ? 'has-error' : '' }}">
                                        <label for="nome">Arabic Address</label>
                                        <input type="text" dir="rtl" name="ar_address" class="form-control"  placeholder="Arabic Address" autofocus value="{{$contact->ar_address}}">
                                        @if($errors->has('ar_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ar_address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                        <label for="nome">Google Map Location</label>
                                        <input type="text" name="location" class="form-control"  placeholder="Google Map Location" autofocus value="{{$contact->location}}">
                                        @if($errors->has('location'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="nome">Email</label>
                                        <input type="email" name="email" class="form-control"  placeholder="email" autofocus value="{{$contact->email}}">
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                        <label for="nome">Mobile</label>
                                        <input type="text" name="mobile" class="form-control"  placeholder="Mobile" autofocus value="{{$contact->mobile}}">
                                        @if($errors->has('mobile'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                                        <label for="nome">Facebook Page Link</label>
                                        <input type="text" name="facebook" class="form-control"  placeholder="https://facebook.com/name" autofocus value="{{$contact->facebook}}">
                                        @if($errors->has('facebook'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                                        <label for="nome">Instagram Account Link</label>
                                        <input type="text" name="instagram" class="form-control"  placeholder="https://instagram.com/name" autofocus value="{{$contact->instagram}}">
                                        @if($errors->has('instagram'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('instagram') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('snapchat') ? 'has-error' : '' }}">
                                        <label for="nome">Snapchat Account Link</label>
                                        <input type="text" name="snapchat" class="form-control"  placeholder="https://snapchat.com/add/name" autofocus value="{{$contact->snapchat}}">
                                        @if($errors->has('snapchat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('snapchat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('tiktok') ? 'has-error' : '' }}">
                                        <label for="nome">Tiktok Account Link</label>
                                        <input type="text" name="tiktok" class="form-control"  placeholder="https://tiktok.com/@name" autofocus value="{{$contact->tiktok}}">
                                        @if($errors->has('tiktok'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tiktok') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
                                        <label for="nome">Youtube Channel Link</label>
                                        <input type="text" name="youtube" class="form-control"  placeholder="https://youtube.com/c/name" autofocus value="{{$contact->youtube}}">
                                        @if($errors->has('youtube'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('youtube') }}</strong>
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


        $('#customFile').change(function(){
            $('#profile-img-tag').hide();
        });

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });

    </script>

@endsection
