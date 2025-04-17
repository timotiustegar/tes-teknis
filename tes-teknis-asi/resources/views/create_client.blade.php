<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Client</title>
</head>
<body>
    <h1>Create New Client</h1>

    <form action="{{ route('store-client') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" required>
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </div>

        <div>
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number">
        </div>

        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
        </div>

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('index') }}">Back to List</a>
</body>
</html>