@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Unir usuario a un Grupo</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($groups as $group)
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-md-between">
                                            <h3 class="card-title float-md-start">
                                                {{$group->name}}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                Aquí deberia ir algunos detalles del grupo
                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('suscribe',$group->id)}}" class="" title="Unir al grupo">Solicitar union</a>
                                            <a href="{{route('group-show', $group)}}">Ver detalles del grupo</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('group-actions')

@can('edit.group')
	<li>
		<a href="{{route('group-edit',$group)}}" title="Editar grupo" class="mb-2">Editar grupo</a>
	</li>
@endcan
@can('add.service.to.group')
	<li>
		<a href="{{ route('group-new-service',$group) }}" class="mb-2">Añadir servicio</a>
	</li>
@endcan
@can('leave.group')
	<li>
		<a href="{{ route('group-new-service',$group) }}" class="mb-2">Dejar grupo</a>
	</li>
@endcan
@can('delete.group')
	<li>
		<form action="{{ route('group-destroy',$group) }}" method="post">
				@csrf
				@method('delete')
				<button class="btn btn-danger mb-2" title="Elimiar Grupo">
					Eliminar Grupo
				</button>
		</form>
	</li>
@endcan
	 
@endsection
