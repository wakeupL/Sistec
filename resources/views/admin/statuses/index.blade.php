@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Estados de tickets</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('statuses.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nuevo estado
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>Estado</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($statuses as $status)
						@if($status->status != 0)
							<tr>
								<td align="center">{{ $status->id }}</td>
								<td align="center"><b>{{ $status->name }}</b></td>
								<td align="center">
					
									<a href="{{ route('statuses.edit', $status->id) }}" onclick="return confirm('¿Estás seguro que deseas editar este estado?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.statuses.destroy', $status->id) }}" onclick="return confirm('¿Estás seguro de eliminar este estado?')" class="btn btn-danger">
										<span class="now-ui-icons ui-1_simple-remove"></span>
									</a>

								</td>
							</tr>
						@else

						@endif

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection