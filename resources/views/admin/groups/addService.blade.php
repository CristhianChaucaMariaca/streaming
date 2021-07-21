@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Agrega un servicio a tu grupo</h3>
            </div>
            <form action="{{ route('service-add',$group) }}" method="GET">
                @method('GET')
                @csrf
                <div class="card-body">


                    <select class="custom-select" name="service_id">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{$service->name}}</option>
                        @endforeach
                    </select>



                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
