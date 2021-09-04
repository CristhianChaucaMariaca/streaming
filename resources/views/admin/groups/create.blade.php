@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Añade un nuevo Grupo
                    </div>
                    <form action="{{route('group-store')}}" method="post">
                        <div class="card-body">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="enable" checked>
                                    <label class="form-check-label" for="status1">
                                        Habilitar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="disable">
                                    <label class="form-check-label" for="status2">
                                        Deshabilitar
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount">Dia de pago:</label>
                                <select name="payday" id="payday">
                                    @for ($i = 1; $i < 29; $i++)
                                        <option value="{{$i}}" type="number">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="members">Miembros</label>
                                <input type="number" class="form-control" name="members" id="members" max="5" min="1">
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
