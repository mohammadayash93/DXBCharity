@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View City')

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
    					<div class="attachment">
                                <h4><b>City Arabic Name: </b></h4>
                                <span>{{ $city->ar_name }}</span>
                                <h4><b>City Name: </b></h4>
                                <span>{{ $city->name }}</span>
                                <h4><b>Country Arabic Name: </b></h4>
                                <span>{{ $city->country->ar_name }}</span>
                                <h4><b>Country Name</b></h4>
                                <span>{{ $city->country->name }}</span>

                                <br><br>
                                <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$city->created_at->format('d/m/Y H:i') }}</p>
                                <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$city->updated_at->format('d/m/Y H:i') }}</p>
                                <br>
                                <div class="pull-right">
                                    <a href="{{ route('city.edit', $city->id) }}" title="Edit {{ $city->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                                </div>
                            </div>
                        </div>
        			</div>
    		</div>
    	</div>
@endsection
