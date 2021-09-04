@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-md-start">Lista de Usuarios</h2>
                    {{-- <a href="{{route('create-user')}}" class="btn btn-primary float-md-end"><span class="material-icons">person_add</span></a> --}}
                    <x-button type="secondary" :route="route('create-user')" icon="person_add" class="float-md-end" title="Agregar Usuario" />
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center table-active" colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td width="1" class="table-active">
                                            <x-button :route="route('user-show',$user->id)" type="secondary" icon="visibility" title="Detalle de Usuario" />
                                        </td>
                                        <td width="1" class="table-active">
                                            <x-button :route="route('user-edit',$user->id)" type="secondary" title="Editar usuario" icon="edit" />
                                        </td>
                                        <td class="table-active" width="1">
                                            <a href="#" class="btn btn-secondary" title="Pagos registrados"><span class="material-icons">payments</span></a>
                                        </td>
                                        <td width="1" class="table-active">
                                            <form action="{{ route('user-destroy',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" title="Elimiar usuario">
                                                    <span class="material-icons">person_remove</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
