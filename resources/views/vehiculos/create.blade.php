@extends('layouts.app')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Parece haber un problema con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Registrar Vehiculo</h2>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Registrar vehiculo') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('vehiculos.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="placa"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Placa') }}</label>

                                    <div class="col-md-6">
                                        <input id="placa" type="text"
                                               class="form-control @error('placa') is-invalid @enderror" name="placa"
                                               value="{{ old('placa') }}" autocomplete="placa" autofocus>

                                        @error('placa')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="color"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                                    <div class="col-md-6">
                                        <input id="color" type="color"
                                               class="form-control @error('color') is-invalid @enderror" name="color"
                                               value="{{ old('color') }}" autocomplete="color">

                                        @error('color')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="marca"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                                    <div class="col-md-6">
                                        <select id="marca" class="form-control @error('marca') is-invalid @enderror"
                                                name="marca">
                                            <option>Chevrolet</option>
                                            <option>Hyundai</option>
                                            <option>Ferrari</option>
                                            <option>Porsche</option>
                                            <option>Audi</option>
                                        </select>

                                        @error('marca')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tipo"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                                    <div class="col-md-6">
                                        <select id="tipo" class="form-control @error('tipo') is-invalid @enderror"
                                                name="tipo">
                                            <option>Carro</option>
                                            <option>Moto</option>
                                        </select>

                                        @error('tipo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="puestos"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Puestos') }}</label>

                                    <div class="col-md-6">
                                        <input id="puestos" type="number"
                                               class="form-control @error('puestos') is-invalid @enderror"
                                               name="puestos" autocomplete="puestos">

                                        @error('puestos')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="display:none">
                                    <label for="cedula"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                                    <div class="col-md-6">
                                        <input id="cedula" type="number"
                                               class="form-control @error('cedula') is-invalid @enderror" name="cedula"
                                               autocomplete="cedula">

                                        @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vehiculos.index') }}"> Back</a>
        </div>
    </div>
@endsection
