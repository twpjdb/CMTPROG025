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
        <option value="Stamppot">Stamppot</option>
        <option value="Soul food">Soul food</option>
        <option value="Kaapverdiaans">Kaapverdiaans</option>
        <option value="BBQ">BBQ</option> 
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