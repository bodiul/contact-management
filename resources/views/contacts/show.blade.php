<!DOCTYPE html>
<html>
<head>
    <title>View Contact</title>
</head>
<body>
<h1>View Contact</h1>

<div>
    <strong>Name:</strong> {{ $contacts->name }}
</div>
<div>
    <strong>Email:</strong> {{ $contacts->email }}
</div>
<div>
    <strong>Phone:</strong> {{ $contacts->phone }}
</div>
<div>
    <strong>Address:</strong> {{ $contacts->address }}
</div>
<br>
<a href="/contacts/{{ $contacts->id }}/edit">Edit</a>
<form action="/contacts/{{ $contacts->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<a href="/contacts">Back to List</a>
</body>
</html>



