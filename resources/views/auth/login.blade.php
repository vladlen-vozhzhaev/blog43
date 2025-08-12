@extends('template')
@section('content')
    <div class="container py-5">
        <h1 class="text-center">Авторизация</h1>
        <div class="col-md-6 mx-auto">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="pass">Пароль:</label>
                    <input id="pass" name="password" type="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary" value="Войти">
                </div>
            </form>
        </div>
    </div>
@endsection
