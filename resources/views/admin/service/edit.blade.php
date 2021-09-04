@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar servicio</h3>
                    </div>
                    <form action="{{ route('service-update', $service) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" value="{{ $service->name }}" name="name" id="name" class="form-control" placeholder="netflix" aria-describedby="name">
                                <small id="helpId" class="text-muted">Nombre del servicio que va a crear</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Textarea</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Servicio de Streaming con contenido en formato de video">
                                {{ $service->description }}
                            </textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="text" value="{{ $service->price }}" name="price" id="price" class="form-control" placeholder="$ 90.0" aria-describedby="price">
                                <small id="helpId" class="text-muted">Precio del servicio</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
