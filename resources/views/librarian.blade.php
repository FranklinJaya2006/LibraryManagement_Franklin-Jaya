<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Dashboard</h1>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
<h1>Selamat datang, librarian</h1>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

<h2>Form Filter Data</h2>
<form action="{{ route('librarian') }}" method="GET">
    <label for="kategori">Kategori:</label>
    <select id="kategori" name="kategori">
        <option value="">Pilih Kategori</option>
        <option value="book" {{ request('kategori') == 'book' ? 'selected' : '' }}>Book</option>
        <option value="jurnal" {{ request('kategori') == 'jurnal' ? 'selected' : '' }}>Jurnal</option>
        <option value="cd" {{ request('kategori') == 'cd' ? 'selected' : '' }}>Cd</option>
        <option value="newspaper" {{ request('kategori') == 'newspaper' ? 'selected' : '' }}>Newspaper</option>
        <option value="dvd" {{ request('kategori') == 'dvd' ? 'selected' : '' }}>Dvd</option>
    </select>

    <label for="sortOrder">Urutkan:</label>
    <select id="sortOrder" name="sortOrder">
        <option value="asc" {{ request('sortOrder') == 'asc' ? 'selected' : '' }}>Ascending</option>
        <option value="desc" {{ request('sortOrder') == 'desc' ? 'selected' : '' }}>Descending</option>
    </select>
    <button type="submit">Filter</button>
</form>

<form method="GET" action="{{ route('createItem') }}">
    @csrf
    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
    <button type="submit">Create</button>
</form>

<hr>

<h3>Hasil Filter:</h3>
@if (isset($items) && count($items) > 0)
    <h4>{{ $message }}</h4>
    @foreach($items as $item)
        <div>
            @foreach ($fields as $field)
                @if (isset($item->$field))
                    <p><strong>{{ ucfirst($field) }}:</strong> {{ $item->$field }}</p>
                @endif
            @endforeach
            <!-- Tombol Edit -->
            <a href="{{ route('edit' . strtolower(class_basename($item)), $item->id) }}">Edit</a>

            <!-- Tombol Hapus -->
            <form action="{{ route('delete' . strtolower(class_basename($item)), $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
            </form>
        </div>
        <hr>
    @endforeach
@else
    <p>Tidak ada data yang ditemukan.</p>
@endif
</body>
</html>
