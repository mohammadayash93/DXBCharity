@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View Page')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('page') }}" class="link_menu_page">
			<i class="fa fa-clone"></i> Pages
		</a>
	</li>

@endsection

@section('content')
    <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-lg-3 text-center">
                        <br>
                        @if(file_exists($page->image))
                          <img src="{{ asset($page->image) }}" class="profile-user-img img-responsive img-circle">
                        @else
                          <img src="{{ asset('public/img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
                        @endif
                        <h3 class="profile-username text-center">
                            {{ $page->name }}
                        </h3>
                        <h3 class="profile-username text-center">
                            {{ $page->ar_name }}
                        </h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="attachment">
                            <h4><b>Description: </b></h4>
                            <span>{!! $page->description !!}</span>
                            <h4><b>Arabic Description: </b></h4>
                            <span dir="rtl">{!! $page->ar_description !!}</span>
                            <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$page->created_at->format('d/m/Y H:i') }}</p>
                            <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$page->updated_at->format('d/m/Y H:i') }}</p>
                            <br>
                            <div class="pull-right">
                                <a href="{{ route('page.edit', $page->id) }}" title="Edit {{ $page->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                            </div>
                        </div>
                    </div>
    		</div>
    	</div>
@endsection
