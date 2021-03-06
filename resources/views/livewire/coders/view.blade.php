@section('title', __('Coders'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			
			<div class="card admin-card">
				<div class="card-header admin-card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								<i class="fas fa-laptop-code text-info"></i> Coders
							</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Coders">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir coder
						</div>
					</div>
				</div>
				
				<div class="card-body admin-card-body">
					@include('livewire.coders.create')
					@include('livewire.coders.update')

					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr> 
									<td>#</td> 
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Fecha de nacimiento</th>
									<th>GitHub</th>
									<th>Promo Id</th>
									<td>Acciones</td>
								</tr>
							</thead>
							<tbody>
								@foreach($coders as $row)
								<tr>
									<td>{{ $loop->iteration }}</td> 
									<td>{{ $row->nombre }}</td>
									<td>{{ $row->apellidos }}</td>
									<td>{{ $row->email }}</td>
									<td>{{ $row->teléfono }}</td>
									<td>{{ $row->fecha_de_nacimiento }}</td>
									<td>{{ $row->github }}</td>
									<td>{{ $row->promo_id }}</td>
									<td width="90">
										<div class="btn-group">
											<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Acciones
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
												<a class="dropdown-item" onclick="confirm('Confirm Delete Coder id {{$row->id}}? \nDeleted Coders cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
											</div>
										</div>
									</td>
								@endforeach
							</tbody>
						</table>
												
						{{ $coders->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>