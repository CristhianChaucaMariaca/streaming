
@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Añade un nuevo usuario
                </div>
                <form action="{{route('user-update',$user->id)}}" method="post">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Guardar" id="name" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
