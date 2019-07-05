@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Rerservar Viaje</h2>
                </div>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <table class="table">
                    <thead>
                    <tr>

                        <th scope="col">Hora de Salida</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Punto de encuentro</th>
                        <th scope="col">Puestos disponibles</th>
                        <th scope="col">Reservar</th>

                    </tr>
                    </thead>

                    <tbody>
                    @if(sizeof($viajes)>0)
                        @foreach ($viajes as $viaje)
                            @if(($viaje -> puestos_disponibles) > 0)
                                <tr>

                                    <td>{{ $viaje->hora_de_salida }}</td>
                                    <td>{{ $viaje->origen }}</td>
                                    <td>{{ $viaje->destino }}</td>
                                    <td>{{ $viaje->punto_de_encuentro }}</td>
                                    <td>{{ $viaje->puestos_disponibles }}</td>
                                    <td>
                                        <form action="{{ route('viajes.reservar',$viaje->id)}}" method="POST">
                                            <button type="submit" class="btn btn-danger" title="Reservar">Reservar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-warning" role="alert">
                                    No hay viajes disponibles actualmente
                                </div>
                            </td>
                        </tr>
                    @endif
                </table>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('home') }}"> Inicio</a>
                </div>
            </div>
        </div>
    </div>

@endsection
