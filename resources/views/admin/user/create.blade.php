@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Añade un nuevo usuario
                    </div>
                    <form action="{{route('user-store')}}" method="post">
                        <div class="card-body">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Guardar" id="name" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
