@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pagos del usuario {{$user->name}}</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col" width="1">#</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Cuota</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->group as $group)
                                <tr>
                                    <td>{{$group->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
