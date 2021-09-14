@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Unir usuario a un Grupo</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($groups as $group)
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-md-between">
                                            <h3 class="card-title float-md-start">
                                                {{$group->name}}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                Aquí deberia ir algunos detalles del grupo
                                            </p>
                                        </div>
                                        <div class="card-footer"><a href="{{route('user-attach-group',$group->id)}}" class="" title="Unir al grupo">Solicitar union</a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
