@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Empresas</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('companies.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Ingresar nueva empresa
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light text-center">
						<th>ID</th>
						<th>Empresa</th>
						<th>RUT</th>
						<th>E-mail</th>
						<th>Dirección</th>
						<th>Número</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($companies as $company)
						@if($company->status != 0)
							<tr>
								<td align="center">{{ $company->id }}</td>
								<td align="center"><b>{{ $company->name }}</b></td>
								<td align="center"><b>{{ $company->rut }}</b></td>
								<td align="center"><b>{{ $company->email }}</b></td>
								<td align="center"><b>{{ $company->address }}</b></td>
								<td align="center"><b>{{ $company->phone_number }}</b></td>
								<td align="center">
					
									<a href="{{ route('companies.edit', $company->id) }}" onclick="return confirm('¿Estás seguro que deseas editar esta empresa?')" class="btn btn-info">
										<span class="now-ui-icons ui-2_settings-90"></span>
									</a>

									<a href="{{ route('admin.companies.destroy', $company->id) }}" onclick="return confirm('¿Estás seguro de eliminar esta empresa?')" class="btn btn-danger">
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