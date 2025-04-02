
@extends('layouts.layout')


@section('content')


<div style="text-align: center">

    <h3>Bem-vindo(a)</h3>

</div>


<div style="text-align: center; margin-top: 50px; margin-bottom: 50px;">

    <img src="{{ asset('img/fotocapa.jpg') }}" alt="Foto Modelo" width="600">

</div>


<div style="text-align: center">

    <ul>
        <li><a href="{{ route('usuarios') }}">Todos os Usuários</a></li>
        <li><a href="{{ route('bandas') }}">Todas as Bandas</a></li>
    </ul>

</div>

@endsection

