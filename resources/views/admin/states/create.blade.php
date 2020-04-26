@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Añadir región</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('states.index') }}" class="btn btn-primary">
							<span class="now-ui-icons arrows-1_minimal-left"></span>
							Volver
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body col-md-4 offset-4">
				<form method="POST" action="{{ route('states.store') }}" class="form">
					@csrf
					<div class="form-group">
						<label for="state">Región</label>
						<input type="text" class="form-control" id="state" name="state" placeholder="Ingrese la región" required>
					</div>
					<div class="form-group">
						<label for="country">País</label>
						<select name="country" id="country" class="form-control">
							<option value="">-- Seleccione un país --</option>

							@foreach($countries as $country)
								<option value="{{ $country->id }}">{{ $country->name }}</option>
							@endforeach

						</select>
					</div>
					<button type="submit" class="btn btn-primary ">Añadir</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection