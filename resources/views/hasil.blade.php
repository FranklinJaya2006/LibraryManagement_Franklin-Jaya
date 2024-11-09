<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Catalog</title>
</head>
<body>
    <h2>Form Filter Data</h2>
    <form action="{{ route('library') }}" method="GET">
        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori">
            <option value="">Pilih Kategori</option>
            <option value="book" {{ request('kategori') == 'book' ? 'selected' : '' }}>Book</option>
            <option value="jurnal" {{ request('kategori') == 'jurnal' ? 'selected' : '' }}>Jurnal</option>
            <option value="cd" {{ request('kategori') == 'cd' ? 'selected' : '' }}>Cd</option>
            <option value="newspaper" {{ request('kategori') == 'newspaper' ? 'selected' : '' }}>Newspaper</option>
            <option value="skripsi" {{ request('kategori') == 'skripsi' ? 'selected' : '' }}>Skripsi</option>
        </select>

        <label for="sortOrder">Urutkan:</label>
        <select id="sortOrder" name="sortOrder">
            <option value="asc" {{ request('sortOrder') == 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('sortOrder') == 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
        <button type="submit">Filter</button>
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
            </div>
            <hr>
        @endforeach
    @else
        <p>Tidak ada data yang ditemukan.</p>
    @endif
</body>
</html>
