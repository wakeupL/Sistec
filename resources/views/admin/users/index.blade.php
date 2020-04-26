@extends('layouts.dash')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-head">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title">&nbsp;Usuarios</h3>
					</div>
					<div class="col-md-6 text-right">
						<a href="{{ route('users.create') }}" class="btn btn-primary">
							<span class="now-ui-icons ui-1_simple-add"></span>
							Crear nuevo usuario
						</a>
					</div>
				</div>
				
			</div>
			<div class="card-body">
				<table class="table table-hover table-bordered" id="documentTable" class="display">
					<thead class="thead-light">
						<th>ID</th>
						<th>Nombre</th>
						<th>Correo electrónico</th>
						<th>Rut</th>
						<th>Tipo</th>
						<th>Accion</th>
					</thead>
					<tbody>
						@foreach($users as $user)
						@if($user->status != 0)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->rut }}</td>
								<td class="text-center">
									@switch($user->status)
										@case(1)
											<span class="badge badge-info">Cliente</span>
										@break
										@case(2)
											<span class="badge badge-warning">Tecnico</span>
										@break
										@case(3)
											<span class="badge badge-light">Supervisor</span>
										@break
										@case(4)
											<span class="badge badge-dark">Jefe Técnico</span>
										@break
										@case(5)
											<span class="badge badge-secondary">Administrador</span>
										@break
									@endswitch	
								</td>

								<td align="center">
									<button type="button" alt="Cambiar contraseña" class="btn btn-primary" data-toggle="modal" data-target="#changePassword">
										<span class="now-ui-icons ui-1_lock-circle-open"></span>
									</button>


									<!-- Modal -->
									<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="changePasswordLabel">Cambiar contraseña</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <form class="form" method="GET" action="{{ route('admin.users.password') }}">
									        	@csrf
									        	<input type="hidden" name="id" value="{{ $user->id }}">
									        	<div class="form-group">
									        		<label for="newPassword">Nueva contraseña</label>
									        		<input type="password" class="form-control" name="newPassword" id="newPassword" required="">
									        	</div>
									        	<div class="form-group">
									        		<label for="confirmPassword">Confirme la contrasñea</label>
									        		<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required="">
									        	</div>
									        
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									        <button type="submit" class="btn btn-primary">Guardar cambios</button>
									      </div>
									      </form>
									    </div>
									  </div>
									</div>

									<a href="{{ route('users.edit', $user->id) }}" onclick="return confirm('¿Estás seguro que deseas editar este usuario?')" class="btn btn-info"><span class="now-ui-icons ui-2_settings-90"></span></a>

									<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="btn btn-danger"><span class="now-ui-icons ui-1_simple-remove"></span></a>

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