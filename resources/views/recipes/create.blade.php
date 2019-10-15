<h1>Create Recipe</h1>

<form action="{{ route('recipes.store') }}" method="post">
    {{ csrf_field() }}

    <label>Name</label>
    <input name="name" type="text">
    <button type="submit">Create Recipe</button>
</form>