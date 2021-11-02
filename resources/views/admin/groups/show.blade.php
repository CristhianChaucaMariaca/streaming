@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title text-center">{{ $group->name }}</h4>
    </div>
    <div class="card-body">
        <p class="card-text">
            <strong>Monto: </strong>
            @if (is_null($group->amount))
                <span>Sin monto asignado</span>
            @else
                <span>
                {{$group->amount}}
            </span>
            @endif
        </p>
        <p>
            <strong>dia de pago:</strong>
            {{$group->payday}}
        </p>
        <p class="card-text">
            <strong>Cuota: </strong>
            @if ($group->quota == 0)
                <span>
                Sin monto asignado por servicio
            </span>
            @else
                <span>
                {{$group->quota}}
            </span>
            @endif
        </p>
    </div>

    @role('administrator')
        <div class="card-header">
            <h4 class="card-title">
                Integrantes Suscritos
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tbody>
                    @foreach($group->suscriptors->where('status','approved') as $approved)
                        <tr>
                            <td>
                                {{$approved->user->name}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endrole

    @role('administrator')
        <div class="card-header">
            <h4 class="card-title">
                Solicitudes pendientes
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tbody>
                @forelse ($group->suscriptors->where('status','pending') as $suscription)
                    <tr>
                        <td>
                            {{$suscription->user->name}}
                        </td>
                        <td>
                            @if ($suscription->status == 'pending')
                                <span>Pendiente</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('approved',[$suscription->id,$group])}}">Aprobar</a>
                        </td>
                        <td><a href="{{route('rejected',$suscription->id)}}">Rechazar</a></td>
                    </tr>
                @empty
                    <x-simpleAlert type="secondary">
                        Este grupo <strong>no cuenta con Solicitudes</strong> en su lista.
                    </x-simpleAlert>
                @endforelse
                </tbody>
            </table>
        </div>
    @endrole
    <div class="card-body">
        <h4 class="cart-title">
            Servicios del grupo
        </h4>
        <table class="table table-hover">
            {{-- <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">Quitar</th>
                </tr>
            </thead> --}}
            <tbody>
            @forelse ($group->services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    @can('dettach.service.from.group')
                        <td><a href="{{ route('remove-service',[$group,$service->id]) }}" class="">Eliminar servicio del grupo</a></td>
                    @endcan
                </tr>
            @empty
                <x-simpleAlert type="secondary">
                    <strong>No cuenta con servicios</strong> agregados
                </x-simpleAlert>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
