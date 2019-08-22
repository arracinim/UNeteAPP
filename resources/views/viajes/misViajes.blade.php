@extends('layouts.app')

@section('content')


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
                <div class="pull-left">
                    <h2>{{ __('Mis Viajes') }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                   <div class="card-header"> <h5 class="card-title">Viajes Ofertados</h5></div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Hora de Salida</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Punto de encuentro</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(sizeof($viajesOfertados) <= 0)
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-warning" role="alert">
                                                    Usted no tiene viajes ofertados en el sistema
                                                </div>
                                            </td>
                                        </tr>

                                    @else
                                        @foreach($viajesOfertados as $viajeOfertado)
                                            <tr>
                                                <td>{{ $viajeOfertado->hora_de_salida }}</td>
                                                <td>{{ $viajeOfertado->origen }}</td>
                                                <td>{{ $viajeOfertado->destino }}</td>
                                                <td>{{ $viajeOfertado->punto_de_encuentro }}</td>
                                                <td>
                                                    <form action="{{ route('misViajes.deleteOfer',$viajeOfertado->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header"> <h5 class="card-title">Viajes Reservados</h5></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Hora de Salida</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Punto de encuentro</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(sizeof($viajesReservados) <= 0)
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning" role="alert">
                                            Usted no tiene viajes reservados en el sistema
                                        </div>
                                    </td>
                                </tr>

                            @else
                                @foreach($viajesReservados as $viajeReservado)
                                    <tr>
                                        <td>{{ $viajeReservado->hora_de_salida }}</td>
                                        <td>{{ $viajeReservado->origen }}</td>
                                        <td>{{ $viajeReservado->destino }}</td>
                                        <td>{{ $viajeReservado->punto_de_encuentro }}</td>
                                        <td>
                                            <form action="{{ route('misViajes.deleteReserve',$viajeReservado->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href = "{{ route('home') }}">Inicio</a>
                </div>
            </div>
        </div>
    </div>
@endsection
