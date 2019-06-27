@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vehiculos</h2>
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

    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Placa</th>
            <th>color</th>
            <th>marca</th>
            <th >tipo</th>
            <th >puestos</th>
            <th >Accion</th>
        </tr>
        @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $vehiculo->placa }}</td>
                <td>{{ $vehiculo->color }}</td>
                <td>{{ $vehiculo->marca }}</td>
                <td>{{ $vehiculo->tipo }}</td>
                <td>{{ $vehiculo->puestos }}</td>
                <td>
                    <form action="{{ route('vehiculos.destroy',$vehiculo->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('vehiculos.show',$vehiculo->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('vehiculos.edit',$vehiculo->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $vehiculos->links() !!}

@endsection