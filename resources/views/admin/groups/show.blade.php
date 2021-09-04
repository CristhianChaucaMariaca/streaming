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
                                <span>Sin servicio</span>
                            @else
                                <span>
                                {{$group->amount}}
                            </span>
                            @endif
                        </p>
                        <p class="card-text">
                            <strong>Estado: </strong>
                            @if ($group->status == "enable")
                                Habilitado
                            @else
                                Deshabilitado
                            @endif
                        </p>
                        <p>
                            <strong>Activo desde:</strong> {{$carbon->now()->diffForHumans($group->created_at)}}
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
                        <p>
                            <strong>cantidad de personas</strong>
                            {{$group->members}}
                        </p>
                    </div>
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
                    <div class="card-header">
                        <h4 class="cart-title">
                            Lista de servicios
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
                                    <td width="1"><a href="{{ route('remove-service',[$group,$service->id]) }}" class="btn btn-danger"><span class="material-icons">delete</span></a></td>
                                </tr>
                            @empty
                                <x-simpleAlert type="secondary">
                                    <strong>No cuenta con servicios</strong> agregados
                                </x-simpleAlert>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @role('Administrator')
                        <div class="card-footer d-flex justify-content-between">

                            <x-button :route="route('group-edit',$group)" title="Editar el Grupo" icon="edit" type="secondary"/>

                            <form action="{{ route('group-destroy',$group) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" title="Elimiar Grupo">
                                    <span class="material-icons">delete</span>
                                </button>
                            </form>
                            <a href="{{ route('group-new-service',$group) }}" class="btn btn-secondary">Añadir servicio</a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection
