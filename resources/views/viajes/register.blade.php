@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ofrecer Viaje</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ofrecer Viaje') }}</div>

                    @if($vehiculos->isNotEmpty())
                    <div class="card-body">
                        <form method="POST" action="{{ route('vehiculos.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="hora_de_salida" class="col-md-4 col-form-label text-md-right">{{ __('Hora y fecha de salida') }}</label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class='input-group date @error('hora_de_salida') is-invalid @enderror' id="hora_de_salida">
                                            <input type='text' class="form-control" name="hora_de_salida"/>
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                        </div>
                                    </div>
                                    @error('hora_de_salida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#hora_de_salida').datetimepicker();
                                    });
                                </script>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Punto de encuentro') }}</label>

                                <div class="col-md-6">
                                    <input id="punto_de_encuentro" type="text" class="form-control @error('punto_de_encuentro') is-invalid @enderror" name="punto_de_encuentro" >

                                    @error('punto_de_encuentro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Puestos disponibles') }}</label>

                                <div class="col-md-6">
                                    <input id="puestos_disponibles" type="number" class="form-control @error('puestos_disponibles') is-invalid @enderror" name="puestos_disponibles" >

                                    @error('puestos_disponibles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Origen') }}</label>

                                <div class="col-md-6">
                                    <select id="origen"class="form-control">
                                        <option>-</option>
                                        <option>Minas</option>
                                        <option>Volador</option>
                                        <option>Ingeominas</option>
                                        <option>Mecanica</option>
                                    </select>

                                    @error('origen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Destino') }}</label>

                                <div class="col-md-6">
                                    <select id="destino"class="form-control">
                                        <option>-</option>
                                        <option>Minas</option>
                                        <option>Volador</option>
                                        <option>Ingeominas</option>
                                        <option>Mecanica</option>
                                    </select>

                                    @error('destino')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Vehiculo') }}</label>

                                <div class="col-md-6">
                                    <select id="vehiculo"class="form-control">
                                        @foreach($vehiculos as $vehiculo)
                                            <option>{{$vehiculo->placa}}</option>
                                         @endforeach
                                    </select>

                                    @error('vehiculo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ofrecer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Usted no tienevehículos registrados actualmente, registre uno
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection

