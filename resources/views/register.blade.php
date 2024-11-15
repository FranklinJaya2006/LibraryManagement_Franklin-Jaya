<form action="{{ route('register') }}" method="POST">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Role:</label>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="librarian">Librarian</option>
    </select><br>

    <button type="submit">Register</button>
</form>
