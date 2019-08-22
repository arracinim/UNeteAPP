@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Usuarios</h2>
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id.</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
            </tr>
            </thead>
            @if(sizeof($usuarios)>0)
                <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="col">{{ $usuario->id }}</th>
                        <td>{{ $usuario->cedula }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <form action="{{ route('admin.destroyUsers',$usuario->id) }}" method="POST">


                                <a class="btn btn-primary" href="{{ route('admin.editUsers',$usuario->id) }}" title="Editar"><i class="fas fa-edit"></i></a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @else
                <tbody>
                <tr>
                    <td colspan="6">
                        <div class="alert alert-warning" role="alert">
                            No existen usuarios registrados en la aplicación
                        </div>
                    </td>
                </tr>
                </tbody>
            @endif
        </table>
    </div>
@endsection
