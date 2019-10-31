@extends('layouts.app')

@section('content')

    <h1>Edit Profile Details</h1>

    <form method="post" action="/profile">
    
    @method('PATCH')

    @include('profile.form')

    <button>Save Profile</button>
    
    </form>

@endsection