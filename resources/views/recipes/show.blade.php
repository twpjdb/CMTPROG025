@extends('layouts.app')
@section('content')

<h1>{{ $recipe->name }}</h1>

<p>{{ $recipe->description }}</p>

@stop