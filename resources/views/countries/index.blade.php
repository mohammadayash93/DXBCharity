@extends('layouts.AdminLTE.index')

@section('icon_page', 'globe')

@section('title', 'Countries')

@section('menu_pagina')

	<li role="presentation">
		<a href="{{ route('country.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Add
		</a>
	</li>


@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
                    <form class="form-inline" style="margin-bottom: 20px;" method="GET" action="{{ route('country') }}">
                        @csrf
                        <div class="form-group">
                          <label for="filter" class="form-label">Filter</label>
                          <input type="text" class="form-control" id="filter" name="search" placeholder="" value="{{ $filter }}">
                        </div>
                        <button type="submit" class="btn btn-default mb-2">Filter</button>
                      </form>
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th>Arabic Name</th>
									<th>Name</th>
									<th class="text-center">ISO2</th>
									<th class="text-center">Phone Code</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($countries as $country)
									<tr>
                                            <td>{{ $country->ar_name }}</td>
                                            <td>{{ $country->name }}</td>
											<td class="text-center">{{ $country->iso2 }}</td>
											<td class="text-center">{{ $country->phonecode }}</td>
											<td class="text-center">{{ $country->created_at->format('d/m/Y H:i') }}</td>
											<td class="text-center">
												 <a class="btn btn-default  btn-xs" href="{{ route('country.show', $country->id) }}" title="See {{ $country->name }}"><i class="fa fa-eye">   </i></a>
												 <a class="btn btn-warning  btn-xs" href="{{ route('country.edit', $country->id) }}" title="Edit {{ $country->name }}"><i class="fa fa-pencil"></i></a>
												 <a class="btn btn-danger  btn-xs" href="#" title="Delete {{ $country->name}}" data-toggle="modal" data-target="#modal-delete-{{ $country->id }}"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
										<div class="modal fade" id="modal-delete-{{ $country->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to delete ({{ $country->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('country.destroy', $country->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
													</div>
												</div>
											</div>
										</div>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>Arabic Name</th>
									<th>Name</th>
									<th class="text-center">ISO2</th>
									<th class="text-center">Phone Code</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col-md-12 text-center">
					{{ $countries->appends($_GET)->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@include('layouts.AdminLTE._includes._data_tables')
