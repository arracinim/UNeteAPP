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
                <th scope="col">Color</th>
                <th scope="col">Marca</th>
                <th scope="col">Tipo</th>
                <th scope="col">Puestos</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            @if(sizeof($vehiculos)>0)
                <tbody>
                @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <th scope="col">{{ ++$i }}</th>
                        <td>{{ $vehiculo->placa }}</td>
                        <td><input id="color" type="color" readonly="readonly" name="color"  value="{{ $vehiculo->color }}" autocomplete="color" disabled="disabled"></td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->tipo }}</td>
                        <td>{{ $vehiculo->puestos }}</td>
                        <td>
                            <form action="{{ route('vehiculos.destroy',$vehiculo->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('vehiculos.show',$vehiculo->id) }}"title="Mostrar"><i class="fas fa-eye"></i></a>

                                <a class="btn btn-primary" href="{{ route('vehiculos.edit',$vehiculo->id) }}" title="Editar"><i class="fas fa-edit"></i></a>

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
                            Usted no tiene vehículos registrados actualmente, registre uno
                        </div>
                    </td>
                </tr>
                </tbody>
            @endif
        </table>
    </div>
@endsection