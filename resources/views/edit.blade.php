@extends('layouts.layout')

@section('content')

<h3>Editar banda</h3>

<hr>

<form action="{{ route('bandas.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $banda->id }}">

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $banda->nome) }}" required>
    </div>

    <div class="form-group">
        <label for="foto">Foto/Imagem</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>

    <div class="form-group">
        <label for="numero_de_albuns">Nº de álbuns</label>
        <input type="number" class="form-control" id="numero_de_albuns" name="numero_de_albuns" value="{{ old('numero_de_albuns', $banda->numero_de_albuns) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
