@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de tus grupos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse (auth()->user()->groups as $group)
                        <div class="card text-left">
                            <div class="card-header">
                                <h4 class="card-title">
                                    {{$group->name}}
                                </h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">

                                </p>

                            </div>
                            <div class="card-footer">
                                <x-button type="secondary" title="Detalles del grupo" :route="route('group-show',$group)" icon="visibility" class="float-md-end"/>
                            </div>
                        </div>
                    @empty
                        <x-simpleAlert type="warning">
                            No se encuentra añadido a ningun grupo por favor busque uno y haga su solicitud.
                        </x-simpleAlert>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
