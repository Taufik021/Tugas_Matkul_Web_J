<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f7f8f4">
    <title>BangunSewa - Katalog Alat Bangunan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f8f4] font-sans text-[#243047]">
    <header class="sticky top-0 z-10 border-b border-[#e8e9e2] bg-[#f7f8f4]/95 backdrop-blur">
        <div class="mx-auto flex min-h-[76px] w-[90%] max-w-[1180px] items-center justify-between">
            <a href="{{ route('tools.index') }}" class="text-2xl font-extrabold tracking-tight text-[#183a32]">
                Bangun<span class="text-[#e88b36]">Sewa.</span>
            </a>
            <a href="#katalog" class="rounded-full bg-[#183a32] px-5 py-2.5 font-bold text-white transition hover:bg-[#245447]">
                Lihat Katalog
            </a>
        </div>
    </header>

    <main>
        <section class="bg-[#f7f8f4]">
            <div class="mx-auto grid min-h-[390px] w-[90%] max-w-[1180px] items-center gap-10 py-14 md:grid-cols-2">
                <div>
                    <p class="mb-5 inline-flex rounded-full border border-[#dce5da] bg-white px-4 py-2 text-xs font-bold uppercase tracking-[1.7px] text-[#426257]">
                        Partner proyek dan renovasi
                    </p>
                    <h1 class="mb-5 text-5xl font-extrabold leading-tight tracking-tight text-[#183a32]">
                        Kerja lebih siap,<br><span class="text-[#e88b36]">tanpa beli alat.</span>
                    </h1>
                    <p class="max-w-xl text-lg leading-8 text-[#65756c]">
                        Temukan alat bangunan yang sesuai kebutuhan proyekmu dan lihat harga sewa harian.
                    </p>
                </div>
                <div class="rounded-[32px] bg-[#e9ede4] p-4 shadow-xl">
                    <img
                        src="https://thumb.wikimedia.org/wikipedia/commons/thumb/e/ea/Cement_mixer2.jpg/960px-Cement_mixer2.jpg"
                        alt="Mesin molen beton untuk pekerjaan konstruksi"
                        class="h-[280px] w-full rounded-[24px] bg-white object-cover"
                    >
                </div>
            </div>
        </section>

        <section id="katalog" class="bg-white py-16">
            <div class="mx-auto w-[90%] max-w-[1180px]">
                <div class="mb-8 text-center">
                    <p class="mb-3 text-xs font-extrabold tracking-[1.8px] text-[#e88b36]">PILIH SESUAI KEBUTUHAN PROYEK</p>
                    <h2 class="mb-3 text-4xl font-extrabold tracking-tight text-[#183a32]">Katalog alat bangunan</h2>
                    <p class="text-[#65756c]">Harga sewa ditampilkan per hari.</p>
                </div>

                <form method="GET" action="{{ route('tools.index') }}" class="mb-8 grid gap-3 md:grid-cols-[minmax(0,1fr)_220px_auto]">
                    <label class="sr-only" for="q">Cari alat</label>
                    <input
                        id="q"
                        name="q"
                        type="search"
                        value="{{ request('q') }}"
                        placeholder="Cari nama, kategori, atau deskripsi alat..."
                        class="w-full rounded-xl border border-[#dfe5dc] bg-white px-4 py-3 outline-none focus:border-[#35634f] focus:ring-2 focus:ring-[#35634f]/15"
                    >
                    <label class="sr-only" for="category">Kategori</label>
                    <select id="category" name="category" class="rounded-xl border border-[#dfe5dc] bg-white px-4 py-3 outline-none focus:border-[#35634f]">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="rounded-full bg-[#183a32] px-6 py-3 font-bold text-white transition hover:bg-[#245447]">
                        Cari Alat
                    </button>
                </form>

                @if ($tools->isEmpty())
                    <p class="rounded-2xl border border-[#e7ebe4] bg-[#f7f8f4] p-8 text-center text-[#65756c]">
                        Alat tidak ditemukan. Coba kata kunci atau kategori lain.
                    </p>
                @else
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($tools as $tool)
                            <article class="overflow-hidden rounded-3xl border border-[#e7ebe4] bg-white shadow-sm">
                                <img
                                    src="{{ $tool->image_url }}"
                                    alt="{{ $tool->name }}"
                                    loading="lazy"
                                    class="h-52 w-full bg-[#f3f6f1] object-contain p-3"
                                >
                                <div class="p-6">
                                    <p class="text-xs font-bold uppercase tracking-wide text-[#e88b36]">{{ $tool->category->name }}</p>
                                    <h3 class="mt-2 text-xl font-extrabold text-[#183a32]">{{ $tool->name }}</h3>
                                    <p class="mt-2 min-h-12 text-sm leading-6 text-[#65756c]">{{ $tool->description }}</p>
                                    <p class="mt-5 font-extrabold text-[#183a32]">
                                        Rp{{ number_format($tool->price_per_day, 0, ',', '.') }}<span class="font-medium text-[#65756c]">/hari</span>
                                    </p>
                                    @if ($tool->image_source)
                                        <a
                                            href="{{ $tool->image_source }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="mt-3 inline-block text-sm text-[#53645c] underline"
                                        >Sumber foto</a>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>

    <footer class="bg-[#102c25] px-5 py-8 text-center text-sm text-[#d4e0d8]">
        <p class="font-bold text-white">&copy; {{ date('Y') }} BangunSewa.</p>
        <p class="mt-1">Sewa alat bangunan untuk proyek yang lebih siap.</p>
    </footer>
</body>
</html>
