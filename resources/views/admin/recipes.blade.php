@extends('layouts.app')
@section('content')

<h1>Recipes</h1>

<a href="{{ url('/admin/recipes/create') }}" class="btn btn-success mb-2">New Recipe</a>
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
                        <a href="/admin/recipes/{{ $recipe->id }}" class="btn btn-primary">Show</a>
                        <a href="/admin/recipes/{{ $recipe->id }}/edit" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" type="submit" form="deleteForm" >Delete</button>
                        <form id="deleteForm" action="/admin/recipes/{{ $recipe->id }}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop