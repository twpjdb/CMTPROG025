<a href="{{ route('recipes.create') }}" class="btn btn-success mb-2">Add</a>
<br>
<div class="row">
    <div class="col-12">

        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->product_code }}</td>
                    <td>{{ $recipe->description }}</td>
                    <td>{{ date('Y-m-d', strtotime($recipe->created_at)) }}</td>
                    <td><a href="{{ route('products.edit',$recipe->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('products.destroy', $recipe->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>