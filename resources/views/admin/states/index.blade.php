@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Regiones</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('states.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nueva region
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>Region</th>
						<th>País</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($states as $stat)
						@if($stat->status != 0)
							<tr>
								<td align="center">{{ $stat->id }}</td>
								<td align="center"><b>{{ $stat->name }}</b></td>
								<td align="center"><b>{{ $stat->country }}</b></td>
								<td align="center">
					
									<a href="{{ route('states.edit', $stat->id) }}" onclick="return confirm('¿Estás seguro que deseas editar este país?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.states.destroy', $stat->id) }}" onclick="return confirm('¿Estás seguro de eliminar esta región?')" class="btn btn-danger">
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