@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View Contact Us')

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
    				<div class="col-lg-3 text-center">
                        <br>
                        @if(file_exists($contact->image))
                          <img src="{{ asset($contact->image) }}" class="profile-user-img img-responsive img-circle">
                        @else
                          <img src="{{ asset('public/img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
                        @endif
                        <h3 class="profile-username text-center">
                            {{ $contact->name }}
                        </h3>
                        <h3 class="profile-username text-center">
                            {{ $contact->ar_name }}
                        </h3>
                        <hr>
                        <h4 class="text-left"><b>Email:</b>
                            <span>{{ $contact->email }}</span>
                        </h4>
                        <h4 class="text-left"><b>Mobile:</b>
                            <span>{{ $contact->mobile }}</span>
                        </h4>
                        <h4 class="text-left"><b>Arabic Address:</b>
                            <span>{{ $contact->ar_address }}</span>
                        </h4>
                        <h4 class="text-left"><b>Address:</b>
                            <span>{{ $contact->address }}</span>
                        </h4>
                        <hr>
                        <h4 class="text-left"><b>Social Media:</b>
                            <a href="{{ $contact->facebook }}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                            <a href="{{ $contact->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="{{ $contact->snapchat }}" target="_blank"><i class="fa fa-snapchat-ghost"></i></a>
                            <a href="{{ $contact->tiktok }}" target="_blank"><i class="fab fa-tiktok"></i></a>
                            <a href="{{ $contact->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        </h4>

                        <h4 class="text-left"><b>Google Map Location:</b>
                            <span>{!! $contact->location !!}</span>
                        </h4>

                    </div>
                    <div class="col-lg-9">
                        <div class="attachment">
                            <h4><b>Description: </b></h4>
                            <span>{!! $contact->description !!}</span>
                            <h4><b>Arabic Description: </b></h4>
                            <span dir="rtl">{!! $contact->ar_description !!}</span>
                            <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$contact->created_at->format('d/m/Y H:i') }}</p>
                            <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$contact->updated_at->format('d/m/Y H:i') }}</p>
                            <br>
                            <div class="pull-right">
                                <a href="{{ route('contact.edit', $contact->id) }}" title="Edit {{ $contact->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                            </div>
                        </div>
                    </div>
    		</div>
    	</div>
@endsection
