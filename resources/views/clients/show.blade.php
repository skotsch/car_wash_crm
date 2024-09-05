<!-- resources/views/clients/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Client Details</h1>
        <p><strong>ID:</strong> {{ $client->id }}</p>
        <p><strong>Last Name:</strong> {{ $client->last_name }}</p>
        <p><strong>First Name:</strong> {{ $client->first_name }}</p>
        <p><strong>Middle Name:</strong> {{ $client->middle_name }}</p>
        <p><strong>Phone:</strong> {{ $client->phone }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
