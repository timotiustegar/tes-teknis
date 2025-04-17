<form action="{{ route('update-client', $client->id) }}" method="POST">
    @csrf
    @method('POST')
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" required>
    </div>

    <div>
        <label for="slug">Slug:</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $client->slug) }}" required>
    </div>

    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ old('address', $client->address) }}">
    </div>

    <div>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $client->phone_number) }}">
    </div>

    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="{{ old('city', $client->city) }}">
    </div>

    <button type="submit">Update Client</button>
</form>