@extends('layouts.app')
@section('content')

<h1>Recipes</h1>

<a href="{{ route('recipes.create') }}" class="btn btn-success mb-2">New Recipe</a>

<form action="/search" method="POST" role="search">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="Search restaurants"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>

    


    <a href="/recipes/?category=Surinaams">Surinaams</a> |
    <a href="/recipes/?category=Stamppot">Stamppot</a> |
    <a href="/recipes/?category=Sushi">Sushi</a> |
    <a href="/recipes/?category=Burgers">Burgers</a> |
    <a href="/recipes/?category=Chinees">Chinees</a> |
    <a href="/recipes/?category=Kip">Kip</a> |
    <a href="/recipes/?category=Thais">Thais</a> |
    <a href="/recipes/?category=Grieks">Grieks</a> 
    <strong><a href="/recipes">Reset</a></strong>


<br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->category }}</td>
                    <td>{{ $recipe->description }}</td>
                    <td class="form_date-field">{{ date('Y-m-d H:i', strtotime($recipe->created_at)) }}</td>
                    <td class="form_date-field">{{ date('Y-m-d H:i', strtotime($recipe->updated_at)) }}</td>
                    <td>
                        <a href="{{ route('recipes.show', $recipe->id)}}" class="btn btn-primary">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop