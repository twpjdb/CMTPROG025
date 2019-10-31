@extends('layouts.app')

@section('content')


<p>{{ $user->name }}</p>

<p>{{ $user->email }}</p>

<a href="/profile/edit">Edit</a>

@endsection 