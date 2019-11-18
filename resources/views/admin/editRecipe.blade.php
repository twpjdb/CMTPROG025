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
        @error('name') <p style="color: red">{{ $message }}</p> @enderror
    </div>

    <div>
    <label for="category">Category</label>
    <select name="category">
        <option value="{{ $recipe->category }}">{{ $recipe->category }}</option>
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
        <textarea name="description" rows="15" cols="53" class="form-control" value="{{ $recipe->description }}">{{ $recipe->description }}</textarea>
        @error('description') <p style="color: red">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Edit Recipe</button>
</form>

@stop