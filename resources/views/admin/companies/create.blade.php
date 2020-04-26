@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Añadir empresa</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('companies.index') }}" class="btn btn-primary">
							<span class="now-ui-icons arrows-1_minimal-left"></span>
							Volver
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body col-md-4 offset-4">
				<form method="POST" action="{{ route('companies.store') }}" class="form">
					@csrf
					<div class="form-group">
						<label for="nCompany">Nombre empresa</label>
						<input type="text" class="form-control" id="nCompany" name="nCompany" placeholder="Nombre de la empresa" value="{{ old('nCompany') }}" required>
					</div>

					<div class="form-group">
						<label for="rut">RUT empresa</label>
						<input type="text" oninput="checkRut(this)" maxlength="12" name="rut" class="form-control" placeholder="Sin puntos ni guión" value="{{ old('rut') }}" required>
					</div>

					<div class="form-group">
						<label for="email">E-Mail empresa</label>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="namecompany@company.com" required>
					</div>
					
					<div class="fomr-group">
						<label for="address">Dirección empresa</label>
						<input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Direccion #312" required>
					</div>

					<div class="form-group">
						<label for="phone">Número de contacto</label>
						<input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="569 XXXXXXXX" required>
					</div>

					<div class="mt-3"></div>
					<button type="submit" class="btn btn-primary ">Añadir</button>
				</form>
			</div>
		</div>
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