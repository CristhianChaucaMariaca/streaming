@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="card-text">
                                <span>Usuario: </span><strong>{{$user->name}}</strong>
                            </p>
                            <p class="card-text">
                                <span>Grupo: </span><strong>{{$group->name}}</strong>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <x-button :route="route('payment-create',[$user,$group])" title="Realizar pago" icon="payment" type="dark" class="float-md-end"/>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Estado</th>
                                <th>N° Cuota</th>
                                <th>Monto</th>
                                <th>Gestión</th>
                                <th>Fecha de pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <td>
                                        @if ($payment->status == 'VERIFIED')
                                            <x-badge type="success" text="Verificado" />
                                        @else
                                            <x-badge type="warning" text="Pendiente" />
                                        @endif
                                    </td>
                                    <td>
                                        {{$payment->fee}}
                                    </td>
                                    <td>
                                        {{$payment->pay}}
                                    </td>
                                    <td>
                                        {{$payment->year}}
                                    </td>
                                    <td>
                                        {{$payment->created_at}}
                                    </td>
                                </tr>
                            @empty
                                <x-simpleAlert type="secondary">
                                        No tiene pagos registrados
                                </x-simpleAlert>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
