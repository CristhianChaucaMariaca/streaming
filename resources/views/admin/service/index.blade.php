@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-md-start">Lista de Servicios</h2>
                    <x-button :route="route('service-create')" type="primary" class="float-md-end" icon="add" title="Añadir servicio" />
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th  scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripción</th>
                                <th scope="col" colspan="3" class="text-center table-active">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td scope="row">{{ $service->id }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->description }}</td>
                                    <td width="1" class="table-active">
                                        <x-button :route="route('service-show', $service)" type="secondary" icon="visibility" title="Ver servicio" />
                                    </td>
                                    <td width="1" class="table-active">
                                        <x-button :route="route('service-edit',$service)" type="warning" title="Editar servicio" icon="edit" />
                                    </td>
                                    <td width="1" class="table-active">
                                        <form action="{{ route('service-destroy',$service) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"><span class="material-icons">delete</span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
