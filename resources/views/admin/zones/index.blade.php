@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Zonas</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('zones.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nueva zona
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>Zona</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($zones as $zone)
						@if($zone->status != 0)
							<tr>
								<td align="center">{{ $zone->id }}</td>
								<td align="center"><b>{{ $zone->name }}</b></td>
								<td align="center">
					
									<a href="{{ route('zones.edit', $zone->id) }}" onclick="return confirm('¿Estás seguro que deseas editar esta zona?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.zones.destroy', $zone->id) }}" onclick="return confirm('¿Estás seguro de eliminar esta zona?')" class="btn btn-danger">
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