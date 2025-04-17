<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Redis</title>
</head>
<body>
    <h1>Check Redis for Client</h1>

    <form action="{{ route('check-redis') }}" method="GET">
        <div>
            <label for="slug">Enter Client Slug:</label>
            <input type="text" id="slug" name="slug" required>
        </div>
        <button type="submit">Check Redis</button>
    </form>

    @if(isset($clientData))
        <h2>Client Data in Redis</h2>
        <pre>{{ json_encode($clientData, JSON_PRETTY_PRINT) }}</pre>
    @elseif(isset($error))
        <p>{{ $error }}</p>
    @endif
</body>
</html>