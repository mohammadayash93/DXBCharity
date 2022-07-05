@extends('layouts.AdminLTE.index')

@section('icon_page', 'eye')

@section('title', 'View Country')

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
    					<div class="attachment">
                                <h4><b>Arabic Name: </b></h4>
                                <span>{{ $country->ar_name }}</span>
                                <h4><b>Name: </b></h4>
                                <span>{{ $country->name }}</span>
                                <h4><b>ISO2: </b></h4>
                                <span>{{ $country->iso2 }}</span>
                                <h4><b>ISO3</b></h4>
                                <span>{{ $country->iso3 }}</span>
                                <h4><b>Phone Code</b></h4>
                                <span>{{ $country->phonecode }}</span>

                                <br><br>
                                <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$country->created_at->format('d/m/Y H:i') }}</p>
                                <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$country->updated_at->format('d/m/Y H:i') }}</p>
                                <br>
                                <div class="pull-right">
                                    <a href="{{ route('country.edit', $country->id) }}" title="Edit {{ $country->name }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                                </div>
                            </div>
                        </div>
        			</div>
    		</div>
    	</div>
@endsection
