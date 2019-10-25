@extends('layouts.app')
@section('content')

<h1>Edit Recipe</h1>

<div class="form_container">
<form action="{{ route('recipes.update', $recipe->id) }}" method="post">
    {{ csrf_field() }}
    @method('patch')

    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control" value="{{ $recipe->name }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit Recipe</button>
</form>

@stop