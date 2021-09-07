@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@forelse ($services as $service)
				<div class="card mb-4">
					<div class="card-header">
						<div class="card-title">
							<h3>
								{{$service->name}}
							</h3>
						</div>
					</div>
					<div class="card-body">
						{{$service->description}}
					</div>
					<div class="card-footer">
						<h5>
							Precio: <strong>{{$service->price}}</strong>
						</h5>
					</div>
				</div>

			@empty
				<em>No existen Registros</em>
			@endforelse
		</div>
	</div>
</div>
	 
@endsection
