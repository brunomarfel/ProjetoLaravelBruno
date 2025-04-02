{{-- @extends('layouts.layout')

@section('content')


@if (Auth::user()->user_type == \App\Models\User::USER_ADMIN)

<div class="alert alert-primary" role="alert">
    Conta de Administrator
</div>

@endif

<h3>Bem-vindo, {{ Auth::user()->name}}!</h3>

@endsection --}}

@@extends('layout.fe_layout')

@section('content')
    @if (Auth::user()->user_type == \App\Models\User::USER_ADMIN)
        <div class="alert alert-primary" role="alert">
            Conta de Administrador
        </div>
    @endif

    <h3>Olá, {{ Auth::user()->name }}!</h3>

    <div class="container mt-4">
        <h4>Bem-vindo ao seu Dashboard</h4>
        <p>Você está logado como {{ Auth::user()->user_type == \App\Models\User::USER_ADMIN ? 'Administrador' : 'Usuário' }}.</p>

        <!-- Se for um administrador, exibe opções extras -->
        @if (Auth::user()->user_type == \App\Models\User::USER_ADMIN)
            <a href="{{ route('admin.panel') }}" class="btn btn-primary">Ir para o Painel de Admin</a>
        @else
            <a href="{{ route('user.profile') }}" class="btn btn-secondary">Ver Perfil</a>
        @endif
    </div>
@endsection

