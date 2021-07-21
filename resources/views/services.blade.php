<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Services</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                @forelse ($services as $service)
                    {{$service->name}}<br>
                    {{$service->price}}<br>
                    {{$service->description}}

                @empty
                    <em>No existen Registros</em>
                @endforelse
            </div>
        </div>
    </body>
</html>
