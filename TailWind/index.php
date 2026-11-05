
<?php
require_once "data.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($deskripsi) ?>">
    <title><?= htmlspecialchars($namaWebsite) ?> - <?= htmlspecialchars($judulHalaman) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            background: #f7f8f4;
        }
    </style>
</head>

<body class="font-sans leading-relaxed text-[#243047]">

<header class="sticky top-0 z-20 border-b border-[#e8e9e2] bg-[#f7f8f4]/95 backdrop-blur">
    <nav class="mx-auto flex min-h-[76px] w-[90%] max-w-[1180px] items-center justify-between gap-5">
        <a href="#beranda" class="text-2xl font-extrabold tracking-tight text-[#183a32]">
            Bangun<span class="text-[#e88b36]">Sewa.</span>
        </a>

        <div class="flex flex-wrap items-center gap-6 text-sm font-semibold">
            <a href="#beranda" class="text-[#53645c] hover:text-[#e88b36]">Beranda</a>
            <a href="#katalog" class="text-[#53645c] hover:text-[#e88b36]">Katalog Alat</a>
            <a href="#informasi" class="text-[#53645c] hover:text-[#e88b36]">Informasi</a>
        </div>
    </nav>
</header>

<main>

    <section id="beranda" class="overflow-hidden bg-[#f7f8f4]">
        <div class="mx-auto grid min-h-[440px] w-[90%] max-w-[1180px] grid-cols-1 items-center gap-10 py-14 md:grid-cols-2">

            <div>
                <p class="mb-5 inline-flex rounded-full border border-[#dce5da] bg-white px-4 py-2 text-xs font-bold uppercase tracking-widest text-[#426257]">
                    Partner Proyek dan Renovasi
                </p>

                <h1 class="mb-5 text-4xl font-extrabold leading-tight tracking-tight text-[#183a32] md:text-5xl">
                    Kerja lebih siap,
                    <span class="text-[#e88b36]">tanpa beli alat.</span>
                </h1>

                <p class="mb-7 max-w-xl text-lg text-[#65756c]">
                    <?= htmlspecialchars($deskripsi) ?>
                </p>

                <a href="#katalog" class="inline-block rounded-full bg-[#183a32] px-7 py-3 font-bold text-white transition hover:bg-[#245447]">
                    Jelajahi Katalog →
                </a>
            </div>

            <div class="overflow-hidden rounded-3xl bg-[#e9ede4] p-3 shadow-xl">
                <img
                    src="<?= htmlspecialchars($tools[3]["gambar"]) ?>"
                    alt="Mesin molen beton untuk konstruksi"
                    class="h-[300px] w-full rounded-2xl bg-white object-cover md:h-[360px]"
                >
            </div>

        </div>
    </section>

    <section id="informasi" class="bg-white py-10">
        <div class="mx-auto grid w-[90%] max-w-[1180px] grid-cols-1 gap-5 sm:grid-cols-3">

            <article class="rounded-2xl border border-[#e7ebe4] bg-[#f7f8f4] p-6">
                <p class="text-sm text-[#65756c]">Total Jenis Alat</p>
                <p class="mt-2 text-3xl font-extrabold text-[#183a32]">
                    <?= $totalAlat ?>
                </p>
            </article>

            <article class="rounded-2xl border border-[#e7ebe4] bg-[#f7f8f4] p-6">
                <p class="text-sm text-[#65756c]">Alat Tersedia</p>
                <p class="mt-2 text-3xl font-extrabold text-green-700">
                    <?= $totalTersedia ?>
                </p>
            </article>

            <article class="rounded-2xl border border-[#e7ebe4] bg-[#f7f8f4] p-6">
                <p class="text-sm text-[#65756c]">Stok Habis</p>
                <p class="mt-2 text-3xl font-extrabold text-red-600">
                    <?= $totalHabis ?>
                </p>
            </article>

        </div>
    </section>

    <section id="katalog" class="bg-white px-5 py-16">
        <div class="mx-auto max-w-[1180px]">

            <div class="mx-auto mb-10 max-w-2xl text-center">
                <p class="mb-3 text-xs font-extrabold tracking-widest text-[#e88b36]">
                    PILIH SESUAI KEBUTUHAN PROYEK
                </p>

                <h2 class="mb-4 text-3xl font-extrabold text-[#183a32] md:text-4xl">
                    <?= htmlspecialchars($judulHalaman) ?>
                </h2>

                <p class="text-[#65756c]">
                    Harga sewa dihitung per hari. Periksa ketersediaan alat sebelum mengajukan sewa.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($tools as $index => $tool): ?>

                    <?php
                    $tersedia = $tool["stok"] > 0;

                    if ($tersedia) {
                        $status = "Tersedia";
                        $badgeClass = "bg-green-100 text-green-700";
                    } else {
                        $status = "Stok Habis";
                        $badgeClass = "bg-red-100 text-red-700";
                    }
                    ?>

                    <article class="flex flex-col overflow-hidden rounded-3xl border border-[#e7ebe4] bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-lg">

                        <div class="flex items-center justify-between px-5 pt-5">
                            <span class="text-sm font-bold text-[#65756c]">
                                Alat #<?= $index + 1 ?>
                            </span>

                            <span class="rounded-full px-3 py-1 text-xs font-bold <?= $badgeClass ?>">
                                <?= htmlspecialchars($status) ?>
                            </span>
                        </div>

                        <img
                            src="<?= htmlspecialchars($tool["gambar"]) ?>"
                            alt="<?= htmlspecialchars($tool["nama"]) ?>"
                            class="mt-3 h-48 w-full bg-[#f7f8f4] object-contain p-4"
                            loading="lazy"
                        >

                        <div class="flex flex-1 flex-col p-5">

                            <p class="mb-2 text-xs font-extrabold uppercase tracking-widest text-[#e88b36]">
                                <?= htmlspecialchars($tool["kategori"]) ?>
                            </p>

                            <h3 class="mb-3 text-xl font-extrabold text-[#183a32]">
                                <?= htmlspecialchars($tool["nama"]) ?>
                            </h3>

                            <p class="mb-5 flex-1 text-sm leading-6 text-[#65756c]">
                                <?= htmlspecialchars($tool["deskripsi"]) ?>
                            </p>

                            <div class="mb-5 flex items-end justify-between gap-3 border-t border-[#edf0e9] pt-4">
                                <div>
                                    <p class="text-xs text-[#65756c]">Harga sewa</p>
                                    <p class="text-lg font-extrabold text-[#183a32]">
                                        Rp<?= number_format($tool["harga"], 0, ",", ".") ?>
                                    </p>
                                    <p class="text-xs text-[#65756c]">per hari</p>
                                </div>

                                <div class="text-right">
                                    <p class="text-xs text-[#65756c]">Stok alat</p>
                                    <p class="font-bold text-[#183a32]">
                                        <?= $tool["stok"] ?> unit
                                    </p>
                                </div>
                            </div>

                            <?php if ($tersedia): ?>
                                <a
                                    href="#kontak"
                                    class="block rounded-full bg-[#183a32] px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-[#245447]"
                                >
                                    Ajukan Sewa
                                </a>
                            <?php else: ?>
                                <button
                                    type="button"
                                    disabled
                                    class="w-full cursor-not-allowed rounded-full bg-gray-200 px-4 py-3 text-sm font-bold text-gray-500"
                                >
                                    Stok Tidak Tersedia
                                </button>
                            <?php endif; ?>

                        </div>
                    </article>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section id="kontak" class="bg-[#183a32] px-5 py-14 text-center text-white">
        <div class="mx-auto max-w-2xl">
            <p class="mb-3 text-xs font-bold uppercase tracking-widest text-orange-300">
                BangunSewa
            </p>

            <h2 class="mb-4 text-3xl font-extrabold">
                Siap Memulai Proyekmu?
            </h2>

            <p class="text-gray-200">
                Pilih alat yang tersedia, lalu hubungi penyedia untuk memastikan harga dan jadwal sewa.
            </p>
        </div>
    </section>

</main>

<footer class="bg-[#102c25] px-5 py-7 text-center text-sm text-white">
    <p class="font-bold">
        &copy; <?= date("Y") ?> <?= htmlspecialchars($namaWebsite) ?>.
    </p>
    <p class="mt-1 text-gray-300">
        Sewa alat bangunan untuk proyek yang lebih siap.
    </p>
</footer>

</body>
</html>
