<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
<h1>Edit Contact</h1>

<!-- resources/views/contacts/edit.blade.php -->
<form action="/contacts/{{ $contacts->id }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $contacts->name }}">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $contacts->email }}">

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="{{ $contacts->phone }}">
    <label for="address">address:</label>
    <input type="text" id="address" name="address" value="{{ $contacts->address }}">

    <button type="submit">Update Contact</button>
</form>

</body>
</html>

