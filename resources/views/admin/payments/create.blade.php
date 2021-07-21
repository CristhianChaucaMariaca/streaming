@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Registrar pago del usuario <strong>{{$user->name}}</strong> en el Grupo <strong>{{$group->name}}</strong>
                </div>
                <form action="{{route('payment-store',[$user,$group])}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status1" value="PENDING" checked>
                            <label class="form-check-label">
                                Pendiente
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status2" value="VERIFIED">
                            <label class="form-check-label">
                                Verificado
                            </label>
                        </div>
                        {{-- <div class="form-group">
                          <label for="group_id">Seleccione un grupo:</label>
                          <select class="form-control" name="group_id" id="group_id">
                            @foreach ($user->groups as $group1)
                                @if ($group1->id === $group->id)
                                    <option value="{{$group1->id}}" selected>{{$group1->name}}</option>
                                @else
                                    <option value="{{$group1->id}}">{{$group1->name}}</option>
                                @endif
                            @endforeach
                          </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="amount">Monto a pagar:</label>
                            <input type="text" name="amount" id="amount" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
