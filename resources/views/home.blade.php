@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<h2>Lista de Grupos</h2>
@forelse (auth()->user()->groups as $group)
    <div class="card text-left">
        <div class="card-header">
            <h4 class="card-title">
                {{$group->name}}
            </h4>
        </div>
        <div class="card-body">
            <p class="card-text">

            </p>

        </div>
        <div class="card-footer">
            <a href="{{route('group-show',$group)}}">Ver detalles del grupo</a>
        </div>
    </div>
@empty
    <x-simpleAlert type="warning">
        No se encuentra añadido a ningun grupo por favor busque uno y haga su solicitud.
    </x-simpleAlert>
@endforelse

<div class="card mt-4">
    <div class="card-header">
        <h4 class="cart-title">Suscriptiones</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Grupo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            @forelse (auth()->user()->suscriptions as $suscription)
                <tr>
                    <td>{{$suscription->group->name}}</td>
                    <td>
                        @if ($suscription->status == 'pending')
                            <span>Pendiente</span>
                        @elseif($suscription->status == 'rejected')
                            <span>Rechazada</span>
                        @else
                            <span>Aprobada</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        <x-simpleAlert type="warning">
                            Suscribete a un Grupo para tener acceso a algún servicio.
                        </x-simpleAlert>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection
