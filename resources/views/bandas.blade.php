@extends('layouts.layout')

@section('content')

<h1 class="text-center">Página de Bandas</h1>

<h3>Adicionar Banda</h3>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="/bandas" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
    </div>

    <div class="mb-3">
        <label for="numero_de_albuns" class="form-label">Nº de Álbuns</label>
        <input type="number" class="form-control" id="numero_de_albuns" name="numero_de_albuns" required>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<hr>

<h3>Lista de Bandas</h3>

<div class="container">
    <!-- Tabela para exibir as bandas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Foto</th>
                <th>Nº de Álbuns</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($bandas as $banda)
                <tr>
                    <td>{{ $banda->nome }}</td>
                    <td><img src="{{ asset('img/fotomodelo.jpg') }}" alt="Foto Modelo" width="100"></td>
                    <td>{{ $banda->numero_de_albuns }}</td>
                    <td>
                        {{-- <a href="{{ route('bandas.albuns', $banda->id) }}" class="btn btn-primary">Ver</a> --}}
                        <a href="{{ route('bandas.albuns', $banda->id) }}" class="btn btn-primary">Ver albuns</a>
                        <a href="{{ route('bandas.editar', $banda->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('apagarBanda', $banda->id) }}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection







