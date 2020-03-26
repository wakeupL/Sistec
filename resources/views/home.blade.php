@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menú</div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                </div>
            @endif
            <div class="card">
                        <div class="card-header">
                            CREAR TICKET
                        </div>
                        <div class="card-body">
                            <form method="POST" action="CREACION DE TICKET - USER">
                                @csrf
                                <div class="row from-group">
                                    <label class="lead col-md-4" for="title">Título</label>
                                    <input type="text" name="title" id="title" class="form-control col-md-8" placeholder="Titulo del Ticket">
                                </div>
                                <div class="mb-2"></div>
                                <div class="row from-group">
                                    <label class="lead col-md-4" for="priority">Prioridad</label>
                                    <select class="form-control col-md-8" name="priority" id="priority">
                                        <option value="">  --  Seleccione prioridad --  </option>
                                        <option value="N">Normal</option>
                                        <option value="M">Media</option>
                                        <option value="A">Alta</option>
                                    </select>
                                </div>
                                <div class="mb-2"></div>
                                <div class="row form-group">
                                    <label for="departament" class="lead col-md-4">Departamento</label>
                                    <select class="form-control col-md-8" name="departament" id="departament">
                                        <option value="">  --  Seleccione departamento --  </option>
                                    </select>
                                </div>
                                <div class="mb-2"></div>
                                <div class="row form-group">
                                    <label for="description" class="lead col-md-4">Descripción</label>
                                    <textarea class="col-md-8 form-control" name="description" id="description"></textarea>
                                </div>
                                <div class="mb-2"></div>
                                <div class="row form-group">
                                    <label for="evidence" class="lead col-md-4">Evidencias y/o Capturas</label>
                                    <input type="file" name="evidence" id="evidence" class="form-control col-md-8">
                                    <span class="text-right col-md-12">Sólo se admiten archivos .jpg .jpge .png. Con un máx. de 2MB.</span>
                                </div>
                                <div class="mb-2"></div>
                                <div class="row form-group">
                                    <div class="col-md-4"></div>
                                    <input type="submit" class="btn btn-primary btn-block col-md-8" value="Crear Ticket">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
        </div>
</div>
@endsection
