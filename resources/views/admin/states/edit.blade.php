@extends('layouts.dash')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h3 class="title">Editando : <span class="lead">{{ $state->name }}</span></h3>
			</div>
			<div class="col-md-6 text-right">
				<a href="{{ route('states.index') }}" class="btn btn-primary">
					<span class="now-ui-icons arrows-1_minimal-left"></span>
					&nbsp;&nbsp; Volver
				</a>
			</div>
		</div>
		
	</div>
	<div class="card-body col-md-4 offset-md-4">

		<form class="form" method="POST" action="{{ route('states.update', $state->id) }}">
			@method('PATCH')
			@csrf

			<div class="form-group">
				<label for="state">Región</label>
				<input type="text" name="state" class="form-control" value="{{ $state->name }}">
			</div>

			<div class="form-group">
				<label for="country">País</label>
				<select name="country" id="" class="form-control">
					<option value="">  -- Seleccione un país --  </option>

					@foreach($country as $country)
						<option value="{{ $country->id }}">{{ $country->name }}</option>
					@endforeach

				</select>
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