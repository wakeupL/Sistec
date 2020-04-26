@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Añadir comuna</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('distrits.index') }}" class="btn btn-primary">
							<span class="now-ui-icons arrows-1_minimal-left"></span>
							Volver
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body col-md-4 offset-4">
				<form method="POST" action="{{ route('distrits.store') }}" class="form">
					@csrf
					<div class="form-group">
						<label for="distrit">Comuna</label>
						<input type="text" class="form-control" id="distrit" name="distrit" placeholder="Ingrese la comuna" required>
					</div>
					<div class="form-group">
						<label for="state">Región</label>
						<select name="state" id="state" class="form-control">
							<option value=""> -- Seleccione la región --</option>
							@foreach($states as $state)

							<option value="{{ $state->id }}">{{ $state->name }}</option>

							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="zone">Zona</label>
						<select name="zone" id="zone" class="form-control">
							<option value=""> -- Seleccione la zona --</option>
							@foreach($zones as $zone)

							<option value="{{ $zone->id }}">{{ $zone->name }}</option>

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