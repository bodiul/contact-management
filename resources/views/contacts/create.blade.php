<!DOCTYPE html>
<html>
<head>
    <title>Create Contact</title>
</head>
<body>
<h1>Create New Contact</h1>

<form method="POST" action="/contacts">
    @csrf
    <div>
        <label>Name:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Phone:</label>
        <input type="text" name="phone">
    </div>
    <div>
        <label>Address:</label>
        <input type="text" name="address">
    </div>
    <button type="submit">Create</button>
</form>
</body>
</html>
