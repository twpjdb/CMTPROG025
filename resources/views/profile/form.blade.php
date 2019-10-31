<div>
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $user->name }}">
    @error('name') <p style="color: red">{{ $message }}</p> @enderror
</div>

<div>
    <label for="Email">Email</label>
    <input type="email" name="email" value="{{ old('email') ?? $user->email }}">
    @error('email') <p style="color: red">{{ $message }}</p> @enderror
</div>

@csrf