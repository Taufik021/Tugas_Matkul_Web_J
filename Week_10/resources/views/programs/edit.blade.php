<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Program</title>
</head>
    <!-- TODO 8: Menyediakan form untuk mengubah data program yang dipilih. -->
<body>
    <main>
        <h1>Ubah Program</h1>
        <form action="{{ route('programs.update', $program) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nama">Nama</label>
            <input id="nama" name="nama" value="{{ old('nama', $program->nama) }}" maxlength="100" required>
            @error('nama') <p>{{ $message }}</p> @enderror

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
            @error('deskripsi') <p>{{ $message }}</p> @enderror

            <button type="submit">Simpan Perubahan</button>
        </form>
        <a href="{{ route('programs.index') }}">Kembali</a>
    </main>
</body>
</html>
