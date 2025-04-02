@extends('layouts.layout')

@section('content')

{{-- <h1 class="text-center">Página de Álbuns</h1>

<p>Esta é a página de álbuns da banda com o ID: {{ $id }}</p> --}}

<h3>Álbuns por banda</h3>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Imagem</th>
            <th>Lançamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($albuns as $album)
            <tr>
                <td>{{ $album->nome }}</td>
                <td><img src="{{ asset('img/fotomodelo.jpg') }}" alt="Foto Modelo" width="200"></td>
                <td>{{ $album->data_de_lancamento }}</td>
            </tr>
        @endforeach
    </tbody>
</table>











@endsection

