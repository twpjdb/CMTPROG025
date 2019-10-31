@extends('layouts.app')
@section('content')

<h1>Create Recipe</h1>

<div class="form_container">
<form action="/admin/recipes" method="post">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Description</label>
    </div>
    <div>
        <textarea name="description" rows="15" cols="53"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Create Recipe</button>
</form>

@stop