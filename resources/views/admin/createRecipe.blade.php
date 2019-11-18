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

    <div>
    <label for="category">Category</label>
    <select name="category">
        <option value=""> --Select--</option>
        <option value="Pizza">Stamppot</option>
        <option value="Sushi">Sushi</option>
        <option value="Burgers">Burgers</option>
        <option value="Chinees">Chinees</option>
        <option value="Kip">Kip</option>
        <option value="Surinaams">Surinaams</option>
        <option value="Thais">Thais</option>
        <option value="Grieks">Grieks</option> 
    </select>
    @error('category') <p style="color: red">{{ $message }}</p> @enderror
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