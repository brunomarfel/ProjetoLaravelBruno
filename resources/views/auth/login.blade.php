@extends('layouts.layout')

@section('content')

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

@endsection
