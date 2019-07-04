@extends('layouts.app')

@section('content')
    <div class="container">
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

        <table class="table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Placa</th>
                <th scope="col">color</th>
                <th scope="col">marca</th>
                <th scope="col">tipo</th>
                <th scope="col">puestos</th>
                <th scope="col">Accion</th>
            </tr>
            </thead>
            @if(sizeof($vehiculos)>0)
                <tbody>
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <th scope="col">{{ ++$i }}</th>
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
                </tbody>
            @else
                <tbody>
                <tr>
                    <td colspan="6">
                        <div class="alert alert-warning" role="alert">
                            Usted no tiene vehículos registrados actualmente, registre uno
                        </div>
                    </td>
                </tr>
                </tbody>
            @endif
        </table>
    </div>
@endsection