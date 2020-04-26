@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Departamentos</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('departments.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nuevo departamento
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>Departamento</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($departments as $department)
						@if($department->status != 0)
							<tr>
								<td align="center">{{ $department->id }}</td>
								<td align="center"><b>{{ $department->name }}</b></td>
								<td align="center">
					
									<a href="{{ route('departments.edit', $department->id) }}" onclick="return confirm('¿Estás seguro que deseas editar este departamento?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.departments.destroy', $department->id) }}" onclick="return confirm('¿Estás seguro de eliminar este departamento?')" class="btn btn-danger">
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