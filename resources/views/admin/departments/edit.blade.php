@extends('layouts.dash')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h3 class="title">Editando : <span class="lead">{{ $department->name }}</span></h3>
			</div>
			<div class="col-md-6 text-right">
				<a href="{{ route('departments.index') }}" class="btn btn-primary">
					<span class="now-ui-icons arrows-1_minimal-left"></span>
					&nbsp;&nbsp; Volver
				</a>
			</div>
		</div>
		
	</div>
	<div class="card-body col-md-4 offset-md-4">

		<form class="form" method="POST" action="{{ route('departments.update', $department->id) }}">
			@method('PATCH')
			@csrf

			<div class="form-group">
				<label for="department">Zona</label>
				<input type="text" name="department" class="form-control" value="{{ $department->name }}">
			</div>

			<div class="mt-3"></div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">
					<span class="now-ui-icons ui-1_simple-add"></span>
					&nbsp;&nbsp; Guardar cambios
				</button>
			</div>
		</form>

	</div>
</div>

@endsection