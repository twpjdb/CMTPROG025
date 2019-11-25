@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/recipes"> < Back</a>

    
    @if(isset($details))
        <h2>Search result for {{ $query }} is :</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $recipe)
                <tr>
                    <td><a href="/recipes/{{ $recipe->id }}">{{$recipe->name}}</a></td>
                    <td>{{$recipe->category}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @if(isset($errorMessage))
       <br> {{ $errorMessage }}
    @endif
</div>
@endsection