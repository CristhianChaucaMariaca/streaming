@extends('layouts/app.blade.php')
        <div class="container">
            <div class="row">
                @forelse ($users as $user)
                    {{$user->name}}
                @empty
                    <em>No existen Registros</em>
                @endforelse
            </div>
        </div>
    </body>
</html>
