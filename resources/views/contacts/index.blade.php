<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
<h1>Contact List</h1>

<form method="GET" action="/contacts">
    <input type="text" name="search" placeholder="Search by name or email">
    <button type="submit">Search</button>
</form>

<a href="/contacts/create">Create New Contact</a>

<table>
    <thead>
    <tr>
        <th><a href="?sort=name">Name</a></th>
        <th><a href="?sort=email">Email</a></th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->address }}</td>
            <td>
                <a href="/contact/{{ $contact->id }}">View</a>
                <a href="/contacts/{{ $contact->id }}/edit">Edit</a>
                <form action="/contacts/{{ $contact->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>


