<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program</title>
</head>
    <!-- TODO 7: Menyediakan form untuk menambahkan program baru. -->
<body>
    <main>
        <h1>Tambah Program</h1>
        <form action="{{ route('programs.store') }}" method="POST">
            @csrf
            <label for="nama">Nama</label>
            <input id="nama" name="nama" value="{{ old('nama') }}" maxlength="100" required>
            @error('nama') <p>{{ $message }}</p> @enderror

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p>{{ $message }}</p> @enderror

            <button type="submit">Simpan</button>
        </form>
        <a href="{{ route('programs.index') }}">Kembali</a>
    </main>
</body>
</html>
