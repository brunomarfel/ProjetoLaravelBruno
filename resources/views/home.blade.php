
@extends('layouts.layout')


@section('content')


<h3>Bem-vindo(a)</h3>

<ul>
    <li><a href="{{ route('usuarios') }}">Todos os Usuários</a></li>
    <li><a href="{{ route('bandas') }}">Todas as Bandas</a></li>
</ul>

@endsection

