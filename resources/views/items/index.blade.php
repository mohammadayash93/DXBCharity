@extends('layouts.AdminLTE.index')

@section('icon_page', 'database')

@section('title', 'Items')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('item.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Add
		</a>
	</li>


@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
                    <form class="form-inline" style="margin-bottom: 20px;" method="GET" action="{{ route('item') }}">
                        @csrf
                        <div class="form-group">
                            <label for="filter" class="form-label">Country</label>
                            <select id="country-dropdown" class="form-control " name="country_id">
                            <option value="0">Select Country</option>
                            @foreach (get_countries() as $c)
                                @if($c->id == $country_id)
                                    <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                @else
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                            @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                        <label for="filter" class="form-label">City</label>
                        <select id="city-dropdown" class="form-control " name="city_id">
                            @if($country_id)
                                <option value="">Select City</option>
                                @foreach (get_cities_by_country_id($country_id) as $cid)
                                    @if($city_id && $cid->id == $city_id)
                                        <option value="{{ $cid->id }}" selected>{{ $cid->name }}</option>
                                    @else
                                        <option value="{{ $cid->id }}">{{ $cid->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Select Country First</option>
                            @endif

                        </select>
                        </div>
                        <div class="form-group">
                            <label for="filter" class="form-label">Category</label>
                            <select  class="form-control select2" name="category_id">
                            <option value="0">Select Category</option>
                            @foreach (get_categories() as $cat)
                                @if($cat->id == $category_id)
                                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                @else
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endif
                            @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="filter" class="form-label">Added By</label>
                            <select  class="form-control select2" name="user_id">
                            <option value="0">Select User</option>
                            @foreach (get_users() as $user)
                                @if($user->id == $user_id)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                            @endforeach
                            </select>
                          </div>
                        {{-- <div class="form-group">
                          <label for="filter" class="form-label">Search</label>
                          <input type="text" class="form-control" id="filter" name="search" placeholder="" value="{{ $filter }}">
                        </div> --}}
                        <button type="submit" class="btn btn-default mb-2">Filter</button>
                      </form>
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th>Category</th>
									<th>Title</th>
									<th>Address</th>
									<th>Added By</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($items as $item)
									<tr>
                                            <td>{{ $item->category->ar_name }} - {{ $item->category->name }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->city->country->name }}, {{ $item->city->name }}, {{ $item->address }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td class="text-center">{{ $item->created_at->format('d/m/Y H:i') }}</td>
											<td class="text-center">
												 <a class="btn btn-default  btn-xs" href="{{ route('item.show', $item->id) }}" title="See {{ $item->title }}"><i class="fa fa-eye">   </i></a>
												 <a class="btn btn-warning  btn-xs" href="{{ route('item.edit', $item->id) }}" title="Edit {{ $item->title }}"><i class="fa fa-pencil"></i></a>
												 <a class="btn btn-danger  btn-xs" href="#" title="Delete {{ $item->title}}" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
										<div class="modal fade" id="modal-delete-{{ $item->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to delete ({{ $item->title }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('item.destroy', $item->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
													</div>
												</div>
											</div>
										</div>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Category</th>
									<th>Title</th>
									<th>Address</th>
									<th>Added By</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col-md-12 text-center">
					{{ $items->appends($_GET)->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@include('layouts.AdminLTE._includes._data_tables')

@section('layout_js')
<script >
$(document).ready(function(){
    $('#country-dropdown').on('change', function() {
        var c_id = this.value;
        $("#city-dropdown").html('');
        $.ajax({
            url:"{{route('city.get_by_country')}}",
            type: "POST",
            data: {
                country_id: c_id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                if(result.cities.length > 0){
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result.cities,function(key,value){
                        $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }else{
                    $('#city-dropdown').html('<option value="">Select Country First</option>');
                }
            }
        });
    });
});
</script>
@endsection
