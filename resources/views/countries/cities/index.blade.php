@extends('layouts.AdminLTE.index')

@section('icon_page', 'building-o')

@section('title', 'Cities')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('city.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Add
		</a>
	</li>


@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
                    <form class="form-inline" style="margin-bottom: 20px;" method="GET" action="{{ route('city') }}">
                        @csrf
                        <div class="form-group">
                            <label for="filter" class="form-label">Country</label>
                            <select class="form-control select2" name="country_id">
                            <option value="-1">Select Country</option>
                            @foreach ($countries as $c)
                                @if($c->id == $country_id)
                                    <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                @else
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endif
                            @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                          <label for="filter" class="form-label">Search</label>
                          <input type="text" class="form-control" id="filter" name="search" placeholder="" value="{{ $filter }}">
                        </div>
                        <button type="submit" class="btn btn-default mb-2">Filter</button>
                      </form>
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th>Country Arabic Name</th>
									<th>Country Name</th>
									<th>City Arabic Name</th>
									<th>City Name</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cities as $city)
									<tr>
                                            <td>{{ $city->country->ar_name }}</td>
                                            <td>{{ $city->country->name }}</td>
                                            <td>{{ $city->ar_name }}</td>
                                            <td>{{ $city->name }}</td>
											<td class="text-center">{{ $city->created_at->format('d/m/Y H:i') }}</td>
											<td class="text-center">
												 <a class="btn btn-default  btn-xs" href="{{ route('city.show', $city->id) }}" title="See {{ $city->name }}"><i class="fa fa-eye">   </i></a>
												 <a class="btn btn-warning  btn-xs" href="{{ route('city.edit', $city->id) }}" title="Edit {{ $city->name }}"><i class="fa fa-pencil"></i></a>
												 <a class="btn btn-danger  btn-xs" href="#" title="Delete {{ $city->name}}" data-toggle="modal" data-target="#modal-delete-{{ $city->id }}"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
										<div class="modal fade" id="modal-delete-{{ $city->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to delete ({{ $city->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('city.destroy', $city->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
													</div>
												</div>
											</div>
										</div>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Country Arabic Name</th>
									<th>Country Name</th>
									<th>City Arabic Name</th>
									<th>City Name</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col-md-12 text-center">
					{{ $cities->appends($_GET)->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@include('layouts.AdminLTE._includes._data_tables')

@section('layout_js')
<script>
    $('.select2').select2({
  matcher: function(term, text, option) {
    return text.toUpperCase().indexOf(term.toUpperCase())>=0 || option.val().toUpperCase().indexOf(term.toUpperCase())>=0;
  }
});
</script>
@endsection
