<form action="{{ route('login') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Pass:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
</form>
