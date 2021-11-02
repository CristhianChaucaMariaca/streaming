@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="float-md-start">Lista de Grupos</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Monto</th>
                <th scope="col">Status</th>
                <th scope="col">Solicitudes</th>
                <th scope="col" colspan="3" class="table-active text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>

            @forelse (Auth::user()->groups as $group)
                <tr>
                    <th>{{$group->id}}</th>
                    <td>{{$group->name}}</td>
                    <td>
                        @if (is_null($group->amount))
                            <span>sin servicios</span>
                        @else
                            <span>{{$group->amount}}</span>
                        @endif
                    </td>
                    <td>
                        @if ($group->status == "enable")
                            Habilitado
                        @else
                            Deshabilitado
                        @endif
                    </td>
                    <td>
                        <a href="{{route('applications', $group)}}">Ver solicitudes</a>
                    </td>
                    <td width="1" class="table-active">
                        <x-button :route="route('group-show',$group)" type="secondary" icon="visibility" title="Ver detalles del grupo" />
                    </td>
                    <td width="1" class="table-active">
                        <x-button :route="route('group-edit',$group)" type="warning" icon="edit" title="Editar grupo" />
                    </td>
                    <td width="1" class="table-active">
                        <form action="{{ route('group-destroy',$group) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-forms.buttonIcon type="danger" icon="delete" />
                        </form>
                    </td>
                </tr>
            @empty
                <p>To tiene grupos creados</p>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">

    </div>
</div>
@endsection
