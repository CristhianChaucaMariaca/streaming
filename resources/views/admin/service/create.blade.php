@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Crear un nuevo servicio</h3>
                    </div>
                    <form action="{{ route('service-store') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="netflix" aria-describedby="name">
                                <small id="helpId" class="text-muted">Nombre del servicio que va a crear</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Textarea</label>
                                <textarea class="form-control is-invalid" name="description" id="description" placeholder="Servicio de Streaming con contenido en formato de video" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor describe el servicio.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="$ 90.0" aria-describedby="price">
                                <small id="helpId" class="text-muted">Precio del servicio</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
