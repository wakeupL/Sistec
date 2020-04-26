@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Comunas</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('distrits.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nueva comuna
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>Comuna</th>
						<th>Región</th>
						<th>Zona</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($distrits as $distrit)
						@if($distrit->status != 0)
							<tr>
								<td align="center">{{ $distrit->id }}</td>
								<td align="center"><b>{{ $distrit->name }}</b></td>
								<td align="center"><b>{{ $distrit->region }}</b></td>
								<td align="center"><b>{{ $distrit->zone }}</b></td>
								<td align="center">
					
									<a href="{{ route('distrits.edit', $distrit->id) }}" onclick="return confirm('¿Estás seguro que deseas editar esta comuna?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.distrits.destroy', $distrit->id) }}" onclick="return confirm('¿Estás seguro que deseas eliminar esta comuna?')" class="btn btn-danger">
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