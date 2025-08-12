@extends('template')
@section('content')
    <h1>{{auth()->user()->name}}</h1>
    <div class="col-3">
        <img src="/storage/{{$user->avatar}}" alt="" width="100%">
        <form action="/updateUserAvatar" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="userAvatar">
            <input type="submit">
        </form>
    </div>
@endsection
