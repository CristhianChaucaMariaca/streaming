@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Editar Grupo</h3>
                </div>
                <form action="{{ route('group-update', $group) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$group->name}}">
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="enable"
                            @if ($group->status == 'enable')
                                checked
                            @endif
                            >

                            <label class="form-check-label" for="status1">
                                Habilitar
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="disable"
                            @if ($group->status == 'disable')
                                checked
                            @endif
                            >
                            <label class="form-check-label" for="status2">
                                Deshabilitar
                            </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="amount">Dia de pago:</label>
                            <select name="payday" id="payday">
                                @for ($i = 1; $i < 29; $i++)
                                    @if ($group->payday == $i)
                                        <option value="{{$i}}" type="number" selected>{{$i}}</option>
                                    @else
                                        <option value="{{$i}}" type="number">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="members">Miembros</label>
                            <input type="number" class="form-control" name="members" id="members" max="5" min="1" value="{{$group->members}}">
                        </div>

                        <div class="form-group">
                            <label for="amount">Monto</label>
                            <input type="text" class="form-control" name="amount" id="amount" value="{{ $group->amount }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                        <a href="{{ route('group-new-service',$group) }}" class="btn btn-secondary">Añadir Servicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
