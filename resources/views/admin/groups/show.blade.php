@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                Lista de integrantes
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tbody>
                                @forelse ($group->users as $user)
                                    <tr>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td width="1">
                                            <x-button :route="route('show-user-payments',[$user,$group])" title="Ver pagos" icon="payments" type="success" />
                                        </td>
                                        <td width="1">
                                            <x-button :route="route('payment-create',[$user,$group])" title="Realizar pago" icon="payment" type="dark"/>
                                        </td>
                                    </tr>
                                @empty
                                    <x-simpleAlert type="secondary">
                                        Este grupo <strong>no cuenta con usuarios</strong> en su lista.
                                    </x-simpleAlert>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endrole
                    <div class="card-header">
                        <h4 class="cart-title">
                            Servicios del grupo
                        </h4>
                    </div>
                    <div class="card-body">
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
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-subtitle">Acciones</h4>
                    </div>
                    <div class="card-body d-flex flex-md-column">
                        @can('edit.group')
                            <a href="{{route('group-edit',$group)}}" title="Editar grupo" class="mb-2">Editar grupo</a>
                        @endcan

                        @can('add.service.to.group')
                            <a href="{{ route('group-new-service',$group) }}" class="mb-2">Añadir servicio</a>
                        @endcan

                        @can('leave.group')
                            <a href="{{ route('group-new-service',$group) }}" class="mb-2">Dejar grupo</a>
                        @endcan

                        {{-- TODO: Trabajar en estos enlaces y vistas para detallar --}}
                        <a href="#" class="mb-2">Ver detalle de pagos</a>
                        <a href="#" class="mb-2">Ver detalles del grupo</a>
                        @can('delete.group')
                            <form action="{{ route('group-destroy',$group) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger mb-2" title="Elimiar Grupo">
                                    Eliminar Grupo
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
