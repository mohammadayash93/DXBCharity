@extends('layouts.AdminLTE.index')

@section('layout_css')
<style>

    .column {
      float: left;
      width: 50%;
      padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
      content: "";
      clear: both;
      display: table;
    }
    .item_image{
        border-radius: 5px;
        box-shadow: 5px 0 5px 0 #3C8DBC;
    }
    </style>
@endsection

@section('icon_page', 'eye')

@section('title', 'View Item')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('item') }}" class="link_menu_page">
			<i class="fa fa-database"></i> Items
		</a>
	</li>

@endsection

@section('content')
    <div class="box box-primary">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-md-12">
                        <div class="col-lg-6">
                            <div class="row">
                                @foreach ($item->items_images as $item_image)
                                    <div class="column">
                                        <img class="item_image" src="{{ asset($item_image->image) }}" alt="{{ $item_image->id }}" style="width:100%">
                                    </div>
                                @endforeach
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="attachment">
                                    <h3><b>{{ $item->title }}</b></h4>
                                    <h4><b>Address: </b></h4>
                                    <span>{{ $item->city->country->name }}, {{ $item->city->name }}, {{ $item->address }}</span>
                                    <h4><b>Added By: </b></h4>
                                    <span>{{ $item->user->name }}</span>
                                    <h4><b>Description: </b></h4>
                                    <span>{!! $item->description !!}</span>
                                    <br><br>
                                    <p class="help-block"><i class="fa fa-clock-o"></i> Created on: {{$item->created_at->format('d/m/Y H:i') }}</p>
                                    <p class="help-block"><i class="fa fa-refresh"></i> Last update: {{$item->updated_at->format('d/m/Y H:i') }}</p>
                                    <br>
                                    <div class="pull-right">
                                        <a href="{{ route('item.edit', $item->id) }}" title="Edit {{ $item->title }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
        			</div>
    		</div>
    	</div>
@endsection
