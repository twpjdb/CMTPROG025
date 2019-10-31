@extends('layouts.app')
@section('content')

<h1>Edit Recipe</h1>

<div class="form_container">
<form action="/admin/recipes/{{ $recipe->id }}" method="post">
    {{ csrf_field() }}
    
    @method('PATCH')

    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control" value="{{ $recipe->name }}">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description" rows="15" cols="53" class="form-control" value="{{ $recipe->description }}"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Edit Recipe</button>
</form>

@stop