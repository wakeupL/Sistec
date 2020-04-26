@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Países</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('countries.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nuevo País
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>País</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($countries as $country)
						@if($country->status != 0)
							<tr>
								<td align="center">{{ $country->id }}</td>
								<td align="center"><b>{{ $country->name }}</b></td>
								<td align="center">
					
									<a href="{{ route('countries.edit', $country->id) }}" onclick="return confirm('¿Estás seguro que deseas editar este país?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.countries.destroy', $country->id) }}" onclick="return confirm('¿Estás seguro de eliminar este país?')" class="btn btn-danger">
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