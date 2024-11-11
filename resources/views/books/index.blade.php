@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Administración de Libros') }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libro</th>
                        <th>Autor</th>
                        @can('editar libros')
                            <th>Acciones</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                @can('editar libros')
                                    <button class="btn btn-success">Editar</button>
                                @endcan
                                @can('eliminar libros')
                                    <button class="btn btn-danger text-white">Eliminar</button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
