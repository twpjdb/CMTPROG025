@extends('layouts.app')

@section('content')


<p>Username: <strong>{{ $user->name }}</strong></p>

<p>Email: <strong>{{ $user->email }}</strong></p>

<a href="/profile/edit">Edit</a>

@endsection 