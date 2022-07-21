@extends('layouts.AdminLTE.index')

@section('icon_page', 'clone')

@section('title', 'Contact Us')

@section('menu_pagina')

	{{-- <li role="presentation">
		<a href="{{ route('contact.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Add
		</a>
	</li> --}}


@endsection

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
                    {{-- <form class="form-inline" style="margin-bottom: 20px;" method="GET" action="{{ route('page') }}">
                        @csrf
                        <div class="form-group">
                          <label for="filter" class="form-label">Filter</label>
                          <input type="text" class="form-control" id="filter" name="search" placeholder="" value="{{ $filter }}">
                        </div>
                        <button type="submit" class="btn btn-default mb-2">Filter</button>
                      </form> --}}
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th>Arabic Name</th>
									<th>Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th class="text-center">Image</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach($contact as $_contact)
									<tr>
                                            <td>{{ $_contact->ar_name }}</td>
                                            <td>{{ $_contact->name }}</td>
                                            <td>{{ $_contact->email }}</td>
                                            <td>{{ $_contact->mobile }}</td>
											<td class="text-center"><img src="{{ asset($_contact->image) }}" style="height: 75px; width:75px; border-radius: 100%;" /></td>
											<td class="text-center">{{ $_contact->created_at->format('d/m/Y H:i') }}</td>
											<td class="text-center">
												 <a class="btn btn-default  btn-xs" href="{{ route('contact.show', $_contact->id) }}" title="See {{ $_contact->name }}"><i class="fa fa-eye">   </i></a>
												 <a class="btn btn-warning  btn-xs" href="{{ route('contact.edit', $_contact->id) }}" title="Edit {{ $_contact->name }}"><i class="fa fa-pencil"></i></a>
												 {{-- <a class="btn btn-danger  btn-xs" href="#" title="Delete {{ $_contact->name}}" data-toggle="modal" data-target="#modal-delete-{{ $_contact->id }}"><i class="fa fa-trash"></i></a> --}}
											</td>
										</tr>
										<div class="modal fade" id="modal-delete-{{ $_contact->id }}">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<h4 class="modal-title"><i class="fa fa-warning"></i> Caution!!</h4>
													</div>
													<div class="modal-body">
														<p>Do you really want to delete ({{ $_contact->name }}) ?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<a href="{{ route('contact.destroy', $_contact->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a>
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
									<th>Email</th>
									<th>Mobile</th>
									<th class="text-center">Image</th>
									<th class="text-center">Created</th>
									<th class="text-center">Actions</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col-md-12 text-center">
					{{ $contact->appends($_GET)->links() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@include('layouts.AdminLTE._includes._data_tables')
