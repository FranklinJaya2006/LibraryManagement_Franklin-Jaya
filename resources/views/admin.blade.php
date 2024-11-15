<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Librarians</title>
</head>
<body>
    <h1>Daftar Librarians</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if ($librarians->isEmpty())
        <p>Tidak ada librarian yang terdaftar.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($librarians as $librarian)
                    <tr>
                        <td>{{ $librarian->id }}</td>
                        <td>{{ $librarian->name }}</td>
                        <td>{{ $librarian->email }}</td>
                        <td>
                            <!-- Hapus librarian -->
                            <form action="{{ route('deleteLibrarian', $librarian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus librarian ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
