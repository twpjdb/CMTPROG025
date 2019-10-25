@extends('layouts.app')
@section('content')

<h1>Create Recipe</h1>

<div class="form_container">
<form action="{{ route('recipes.store') }}" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create Recipe</button>
</form>

@stop