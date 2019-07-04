@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <h2>Reservar Viaje</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Inicio </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Porfavor verifique lo siguiente:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hora de Salida</th>
            <th scope="col">Origen</th>
            <th scope="col">Destino</th>
            <th scope="col">Punto de encuentro</th>
            <th scope="col">Puestos disponibles</th>
            <th scope="col">Reservar</th>

        </tr>
        </thead>

        <tbody>
        @foreach ($viajes as $viaje)
            @if(($viaje -> puestos_disponibles) > 0)
            <tr>
                <td>{{ $viaje->id }}</td>
                <td>{{ $viaje->hora_de_salida }}</td>
                <td>{{ $viaje->origen }}</td>
                <td>{{ $viaje->destino }}</td>
                <td>{{ $viaje->punto_de_encuentro }}</td>
                <td>{{ $viaje->puestos_disponibles }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('viajes.reservar',$viaje->id)}}">RESERVAR</a>
                </td>
            </tr>
            @endif
        @endforeach

    </table>



@endsection
