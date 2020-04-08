@extends('layouts.dash')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h3 class="title">Editando a: <span class="lead">{{ $user->name }}</span></h3>
			</div>
			<div class="col-md-6 text-right">
				<a href="{{ route('users.index') }}" class="btn btn-primary">
					<span class="now-ui-icons arrows-1_minimal-left"></span>
					&nbsp;&nbsp; Volver
				</a>
			</div>
		</div>
		
	</div>
	<div class="card-body col-md-4 offset-md-4">

		<form class="form" method="POST" action="{{ route('users.update', $user->id) }}">
			@method('PATCH')
			@csrf

			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" name="name" class="form-control" placeholder="Nombre y apellido" value="{{ $user->name }}">
			</div>

			<div class="form-group">
				<label for="email">Correo electrónico</label>
				<input type="email" name="email" class="form-control" placeholder="Ingrese correo electrónico" value="{{ $user->email }}" required>
			</div>

			<div class="form-group">
				<label for="rut">RUT</label>
				<input type="text" oninput="checkRut(this)" maxlength="12" name="rut" class="form-control" value="{{ $user->rut }}" required>
			</div>

			<div class="form-group">
				<label for="status">Tipo de usuario</label>
				<select name="status" id="status" class="form-control">
					<option value="">  -- Seleccione un tipo --  </option>

					@foreach($roles as $rol)
						<option value="{{ $rol->id }}">{{ $rol->name }}</option>
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
<script>
	function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');
    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv
    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {
    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
</script>
	@endsection