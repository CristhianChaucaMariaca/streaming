@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ $user->name }}</div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <strong>Se unio:</strong>
                            {{$carbon->now()->diffForHumans($user->created_at)}}
                        </p>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">Mis grupos</h6>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th colspan="3" class="text-center table-active">acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($user->groups as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{$group->name}}</td>
                                    <td width="1" class="table-active"><a href="{{route('user-detach-group',[$user,$group->id])}}" title="Salir del grupo" class="btn btn-secondary"><span class="material-icons">group_remove</span></a></td>
                                    <td width="1" class="table-active"><a href="{{ route('group-show',$group) }}" title="Detalles del grupo" class="btn btn-secondary"><span class="material-icons">visibility</span></a></td>
                                    <td width="1" class="table-active"><a href="{{route('payment-create',[$user,$group])}}" class="btn btn-dark" title="Realizar pago"><span class="material-icons">payment</span></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No se encuentra agregado a ningun grupo</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('user-edit',$user->id) }}" class="btn btn-secondary" title="Editar usuario"><span class="material-icons">edit</span></a>
                        <form action="{{ route('user-destroy',$user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-secondary" title="Eliminar usuario">
                                <span class="material-icons">delete</span>
                            </button>
                        </form>
                        <a href="{{route('user-join-group',$user)}}" class="btn btn-secondary"  title="Unir a grupo"><span class="material-icons">group_add</span></a>
                        <td class="table-active" width="1"><a href="#" class="btn btn-secondary" title="Pagos registrados"><span class="material-icons">payments</span></a></td>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
