@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$group->name}}</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Grupo
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th colspan="1">
                            acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscriptions as $suscription)
                        <tr>
                            <td>
                                {{$suscription->id}}
                            </td>
                            <td>
                                {{$suscription->name}}
                            </td>
                            <td>
                                {{$suscription->gname}}
                            </td>
                            <td>{{$suscription->status}}</td>
                            <td>
                                {{$suscription->created_at}}
                            </td>
                            <td>
                                <a href="{{route('approved',[$suscription->id, $group])}}">Aprobar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
