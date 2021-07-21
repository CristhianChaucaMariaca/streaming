@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $service->name }}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $service->description }}
                    </p>
                </div>
                <div class="card-footer">
                    <strong>Precio:</strong> {{ $service->price }}
                </div>
            </div>
        </div>
    </div>
@endsection
