@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Vehiculo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vehiculos.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Parece haber un problemas con los datos ingresados.<br><br>
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
                    <div class="card-header">{{ __('Editar vehiculo') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('vehiculos.update',$vehiculo->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="placa" class="col-md-4 col-form-label text-md-right">{{ __('Placa') }}</label>

                                <div class="col-md-6">
                                    <input id="placa" type="text" class="form-control" name="placa" value="{{ $vehiculo->placa }}"  autocomplete="placa" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ $vehiculo->color }}" autocomplete="color">

                                    @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                                <div class="col-md-6">
                                    <input id="marca" type="text" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ $vehiculo->marca }}"  autocomplete="marca">

                                    @error('marca')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de vehiculo') }}</label>

                                <div class="col-md-6">
                                    <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo"  value="{{ $vehiculo->tipo }}" autocomplete="tipo">

                                    @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="puestos" class="col-md-4 col-form-label text-md-right">{{ __('Puestos') }}</label>

                                <div class="col-md-6">
                                    <input id="puestos" type="number" class="form-control @error('puestos') is-invalid @enderror" name="puestos"  value="{{ $vehiculo->puestos }}" autocomplete="puestos">

                                    @error('puestos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection