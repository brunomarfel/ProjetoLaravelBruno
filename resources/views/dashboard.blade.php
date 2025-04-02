@extends('layouts.layout')

@section('content')


@if (Auth::user()->user_type == \App\Models\User::USER_ADMIN)

<div class="alert alert-primary" role="alert">
    Conta de Administrator
</div>

@endif

<h3>Bem-vindo, {{ Auth::user()->name}}!</h3>

@endsection
