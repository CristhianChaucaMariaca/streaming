@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($groups as $group)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title float-md-start">
                                        {{$group->name}}
                                    </h3>
                                    @if ($group->status == 'enable')
                                        <span class="badge bg-success float-md-end">Habilitado</span>
                                    @else
                                        <span class="badge bg-info float-md-end">Deshabilitado</span>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Aquí deberia ir algunos detalles del grupo
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a
                                        @if(Route::has('login'))                                  
                                            @auth
                                                href="{{route('group-show',$group)}}" 
                                            @else
                                                href="{{route('login')}}" 
                                            @endauth
                                        @endif
                                        class="btn btn-primary" title="Detalles del grupo">Detalles del Grupo
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
