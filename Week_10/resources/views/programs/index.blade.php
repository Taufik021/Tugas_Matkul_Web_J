<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program</title>
</head>
    <!-- TODO 6: Menampilkan daftar program beserta aksi ubah dan hapus. -->
<body>
    <main>
        <h1>Daftar Program</h1>

        @if (session('success'))
            <p role="status">{{ session('success') }}</p>
        @endif

        <p><a href="{{ route('programs.create') }}">Tambah Program</a></p>

        @forelse ($programs as $program)
            <article>
                <h2>{{ $program->nama }}</h2>
                <p>{{ $program->deskripsi }}</p>
                <a href="{{ route('programs.edit', $program) }}">Ubah</a>
                <form action="{{ route('programs.destroy', $program) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </article>
        @empty
            <p>Belum ada program.</p>
        @endforelse
    </main>
</body>
</html>
