@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View Category')

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
    				<div class="col-lg-3 text-center">
                        <br>
                        @if(file_exists($category->image))
                          <img src="{{ asset($category->image) }}" class="profile-user-img img-responsive img-circle">
                        @else
                          <img src="{{ asset('public/img/config/nopic.png') }}" class="profile-user-img img-responsive img-circle">
                        @endif
                        <h3 class="profile-username text-center">
                            {{ $category->name }}
                        </h3>
                        <h3 class="profile-username text-center">
                            {{ $category->ar_name }}
                        </h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="attachment">
                            <br><br><br>
                            <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$category->created_at->format('d/m/Y H:i') }}</p>
                            <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$category->updated_at->format('d/m/Y H:i') }}</p>
                            <br>
                            <div class="pull-right">
                                <a href="{{ route('category.edit', $category->id) }}" title="Edit {{ $category->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                            </div>
                        </div>
                    </div>
    		</div>
    	</div>
@endsection
