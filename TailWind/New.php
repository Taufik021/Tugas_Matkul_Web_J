<?php
$namaWebsite = 'BangunSewa';
$judulHalaman = 'Katalog alat bangunan';

$daftarAlat = [
    [
        'nama' => 'Bor Tangan',
        'kategori' => 'Alat listrik',
        'deskripsi' => 'Cocok untuk pekerjaan pengeboran ringan hingga sedang.',
        'harga' => 50000,
        'status' => 'tersedia'
    ],
    [
        'nama' => 'Mesin Molen',
        'kategori' => 'Alat konstruksi',
        'deskripsi' => 'Digunakan untuk membantu mencampur adukan beton.',
        'harga' => 250000,
        'status' => 'terbatas'
    ],
    [
        'nama' => 'Gerinda',
        'kategori' => 'Alat listrik',
        'deskripsi' => 'Digunakan untuk memotong atau menghaluskan material.',
        'harga' => 45000,
        'status' => 'disewa'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($namaWebsite, ENT_QUOTES, 'UTF-8') ?>
        - <?= htmlspecialchars($judulHalaman, ENT_QUOTES, 'UTF-8') ?>
    </title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f7f8f4] font-sans text-[#243047]">
    <header class="bg-[#183a32] px-6 py-5 text-white">
        <h1 class="text-2xl font-bold">
            <?= htmlspecialchars($namaWebsite, ENT_QUOTES, 'UTF-8') ?>
        </h1>
    </header>

    <main class="mx-auto w-[90%] max-w-[1180px] py-12">
        <section>
            <h2 class="mb-2 text-3xl font-extrabold text-[#183a32]">
                <?= htmlspecialchars($judulHalaman, ENT_QUOTES, 'UTF-8') ?>
            </h2>

            <p class="mb-8 text-[#65756c]">
                Pilih alat yang sesuai dengan kebutuhan proyekmu.
            </p>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($daftarAlat as $index => $alat): ?>
                    <?php
                    if ($alat['status'] === 'tersedia') {
                        $labelStatus = 'Tersedia';
                        $warnaBadge = 'bg-green-100 text-green-800';
                    } elseif ($alat['status'] === 'terbatas') {
                        $labelStatus = 'Stok terbatas';
                        $warnaBadge = 'bg-yellow-100 text-yellow-800';
                    } else {
                        $labelStatus = 'Sedang disewa';
                        $warnaBadge = 'bg-red-100 text-red-800';
                    }
                    ?>

                    <article class="rounded-2xl border border-[#e7ebe4] bg-white p-6 shadow-sm">
                        <div class="mb-4 flex items-center justify-between gap-3">
                            <span class="text-sm font-bold text-[#e88b36]">
                                Alat #<?= $index + 1 ?>
                            </span>

                            <span class="rounded-full px-3 py-1 text-xs font-bold <?= $warnaBadge ?>">
                                <?= htmlspecialchars($labelStatus, ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </div>

                        <p class="mb-2 text-xs font-bold uppercase tracking-wide text-[#65756c]">
                            <?= htmlspecialchars($alat['kategori'], ENT_QUOTES, 'UTF-8') ?>
                        </p>

                        <h3 class="mb-2 text-xl font-extrabold text-[#183a32]">
                            <?= htmlspecialchars($alat['nama'], ENT_QUOTES, 'UTF-8') ?>
                        </h3>

                        <p class="mb-5 text-sm leading-6 text-[#65756c]">
                            <?= htmlspecialchars($alat['deskripsi'], ENT_QUOTES, 'UTF-8') ?>
                        </p>

                        <p class="font-extrabold text-[#183a32]">
                            Rp<?= number_format($alat['harga'], 0, ',', '.') ?>/hari
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>