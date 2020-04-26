@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Añadir departamento</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('departments.index') }}" class="btn btn-primary">
							<span class="now-ui-icons arrows-1_minimal-left"></span>
							Volver
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body col-md-4 offset-4">
				<form method="POST" action="{{ route('departments.store') }}" class="form">
					@csrf
					<div class="form-group">
						<label for="department">Departamento</label>
						<input type="text" class="form-control" id="department" name="department" placeholder="Ingrese el departamento" required>
					</div>
					
					<button type="submit" class="btn btn-primary ">Añadir</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection