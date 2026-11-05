<?php
$daftarAlat = $daftarAlat ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f7f8f4">
  <title>BangunSewa - Sewa Alat Bangunan (MVC)</title>
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
  <!-- NAVBAR -->
  <header class="sticky top-0 z-20 border-b border-[#e8e9e2] bg-[#f7f8f4]/95 backdrop-blur">
    <div class="mx-auto flex min-h-[76px] w-[90%] max-w-[1180px] items-center justify-between gap-6 max-[800px]:flex-wrap max-[800px]:py-3">
      <a href="#beranda" class="text-[25px] font-extrabold tracking-tight text-[#183a32] no-underline">
        Bangun<span class="text-[#e88b36]">Sewa</span><span class="text-[#e88b36]">.</span>
      </a>

      <nav id="menu" class="flex items-center gap-8 max-[800px]:hidden max-[800px]:w-full max-[800px]:flex-col max-[800px]:items-stretch max-[800px]:gap-2 max-[800px]:pb-2">
        <a href="#beranda" class="font-semibold text-[#53645c] no-underline transition hover:text-[#e88b36]">Beranda</a>
        <a href="#alat" class="font-semibold text-[#53645c] no-underline transition hover:text-[#e88b36]">Katalog Alat</a>
        <a href="#cara-sewa" class="font-semibold text-[#53645c] no-underline transition hover:text-[#e88b36]">Cara Sewa</a>
        <a href="#kontak" class="rounded-full bg-[#183a32] px-5 py-2.5 text-center font-bold text-white no-underline transition hover:bg-[#245447]">Ajukan Sewa</a>
      </nav>
    </div>
  </header>

  <main>
    <!-- BERANDA / HERO SECTION -->
    <section id="beranda" class="overflow-hidden bg-[#f7f8f4]">
      <div class="mx-auto grid min-h-[570px] w-[90%] max-w-[1180px] grid-cols-[1.05fr_0.95fr] items-center gap-12 py-16 max-[800px]:grid-cols-1 max-[800px]:gap-10 max-[800px]:py-12">
        <div class="py-5 max-[800px]:text-center">
          <p class="mb-5 inline-flex items-center gap-2 rounded-full border border-[#dce5da] bg-white px-4 py-2 text-xs font-bold uppercase tracking-[1.7px] text-[#426257]">
            <span class="h-2 w-2 rounded-full bg-[#e88b36]"></span>
            Partner proyek dan renovasi
          </p>
          <h2 class="mb-6 max-w-[680px] text-[58px] font-extrabold leading-[1.05] tracking-[-2px] text-[#183a32] max-[800px]:mx-auto max-[800px]:text-[42px]">
            Kerja lebih siap,<br>
            <span class="text-[#e88b36]">tanpa beli alat.</span>
          </h2>
          <p class="mb-8 max-w-[560px] text-lg leading-8 text-[#65756c] max-[800px]:mx-auto">
            Sewa alat bangunan untuk kebutuhan harian proyekmu. Temukan alat yang tepat, cek harga, lalu ajukan permintaan sewa dengan mudah.
          </p>
          <div class="flex flex-wrap gap-3 max-[800px]:justify-center">
            <a href="#alat" class="rounded-full bg-[#183a32] px-7 py-3.5 font-bold text-white no-underline shadow-lg transition hover:bg-[#245447]">Jelajahi Katalog →</a>
            <a href="#cara-sewa" class="rounded-full border border-[#d5ddd3] bg-white px-7 py-3.5 font-bold text-[#183a32] no-underline transition hover:border-[#183a32]">Cara menyewa</a>
          </div>
          <div class="mt-10 flex flex-wrap gap-8 max-[800px]:justify-center">
            <div><p class="text-2xl font-extrabold text-[#183a32]">Mudah</p><p class="text-sm text-[#65756c]">Pilih alat yang dibutuhkan</p></div>
            <div><p class="text-2xl font-extrabold text-[#183a32]">Harian</p><p class="text-sm text-[#65756c]">Harga sewa per hari</p></div>
            <div><p class="text-2xl font-extrabold text-[#183a32]">Praktis</p><p class="text-sm text-[#65756c]">Ajukan permintaan online</p></div>
          </div>
        </div>

        <div class="relative mx-auto w-full max-w-[510px]">
          <div class="relative overflow-hidden rounded-[32px] bg-[#e9ede4] p-4 shadow-2xl">
            <?php if (!empty($daftarAlat[3])): ?>
              <img src="<?= $daftarAlat[3]->getImageUrl(); ?>" alt="Mesin Molen" class="h-[390px] w-full rounded-[24px] bg-white object-cover">
            <?php endif; ?>
            <div class="absolute bottom-8 left-8 right-8 rounded-2xl border border-white/70 bg-white/95 p-5 shadow-xl backdrop-blur">
              <p class="text-xs font-bold uppercase tracking-[1.5px] text-[#e88b36]">Alat pilihan proyek</p>
              <div class="mt-1 flex items-end justify-between gap-3">
                <div>
                  <p class="text-xl font-extrabold text-[#183a32]"><?= $daftarAlat[3]->getName() ?? 'Mesin Molen Beton'; ?></p>
                  <p class="text-sm text-[#65756c]">Mulai dari</p>
                </div>
                <p class="text-lg font-extrabold text-[#183a32]"><?= $daftarAlat[3]->getHargaFormatted() ?? 'Rp250rb'; ?><span class="text-xs font-medium text-[#65756c]">/hari</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- DAFTAR ALAT (KATALOG) -->
    <section id="alat" class="bg-white py-20">
      <div class="mx-auto w-[90%] max-w-[1180px]">
        <div class="mx-auto mb-10 max-w-[700px] text-center">
          <p class="mb-3 text-xs font-extrabold tracking-[1.8px] text-[#e88b36]">PILIH SESUAI KEBUTUHAN PROYEK</p>
          <h2 class="mb-4 text-[40px] font-extrabold text-[#183a32]">Katalog alat bangunan</h2>
          <p class="text-[#65756c]">Harga ditampilkan per hari. Data dirender dinamis dari Model melalui Controller.</p>
        </div>

        <!-- GRID OBJECT -->
        <div class="grid grid-cols-3 gap-[25px] max-[800px]:grid-cols-1">
          <?php foreach ($daftarAlat as $alat): ?>
            <article class="bg-white rounded-[14px] overflow-hidden shadow-[0_6px_20px_rgba(30,50,90,0.08)] flex flex-col justify-between">
              <div>
                <img src="<?= $alat->getImageUrl(); ?>" alt="<?= $alat->getName(); ?>" class="h-48 w-full bg-[#f8fafc] object-contain p-2" loading="lazy">
                <a href="<?= $alat->getImageSource(); ?>" target="_blank" class="block border-b border-[#edf0e9] bg-[#f8f9f6] px-4 py-2 text-xs text-[#65756c] underline hover:text-[#183a32]">
                  Sumber foto: Wikimedia Commons
                </a>
              </div>
              <div class="p-[25px] flex flex-1 flex-col justify-between">
                <div>
                  <p class="mb-1 text-xs font-extrabold uppercase tracking-[1.4px] text-[#e88b36]"><?= $alat->getCategory(); ?></p>
                  <h3 class="mb-[10px] text-[21px] font-bold text-[#183a32]"><?= $alat->getName(); ?></h3>
                  <p class="text-[#69758a] mb-[15px] text-sm leading-6 min-h-[50px]"><?= $alat->getDescription(); ?></p>
                </div>
                <div>
                  <strong class="block text-[#1f3c88] mb-5">
                    Mulai <?= $alat->getHargaFormatted(); ?>/hari
                  </strong>
                  <a href="#kontak" class="inline-block no-underline rounded-lg font-bold bg-[#f39c12] text-white py-[10px] px-[14px] text-[14px] transition hover:bg-[#d98200]">
                    Tanya Informasi
                  </a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- CARA SEWA -->
    <section id="cara-sewa" class="py-20 bg-[#f7f8f4]">
      <div class="mx-auto w-[90%] max-w-[1180px]">
        <div class="mx-auto mb-12 max-w-[700px] text-center">
          <p class="mb-3 text-xs font-extrabold tracking-[1.8px] text-[#e88b36]">TIGA LANGKAH MUDAH</p>
          <h2 class="mb-4 text-[40px] font-extrabold text-[#183a32]">Cara menyewa alat</h2>
          <p class="text-[#65756c]">Dari memilih alat sampai mengirim permintaan, semua dimulai dari sini.</p>
        </div>

        <div class="grid grid-cols-3 gap-5 max-[800px]:grid-cols-1">
          <article class="rounded-3xl border border-[#e7ebe4] bg-white p-7">
            <span class="mb-5 grid h-12 w-12 place-items-center rounded-2xl bg-[#f8eadb] text-lg font-extrabold text-[#c96d20]">01</span>
            <h3 class="mb-2 text-xl font-extrabold text-[#183a32]">Pilih alat</h3>
            <p class="text-[#65756c]">Cari alat yang sesuai dengan kebutuhan pekerjaanmu di katalog.</p>
          </article>
          <article class="rounded-3xl border border-[#e7ebe4] bg-white p-7">
            <span class="mb-5 grid h-12 w-12 place-items-center rounded-2xl bg-[#e6eee7] text-lg font-extrabold text-[#35634f]">02</span>
            <h3 class="mb-2 text-xl font-extrabold text-[#183a32]">Tentukan jadwal</h3>
            <p class="text-[#65756c]">Isi nama, nomor telepon, tanggal mulai, dan lama sewa.</p>
          </article>
          <article class="rounded-3xl border border-[#e7ebe4] bg-white p-7">
            <span class="mb-5 grid h-12 w-12 place-items-center rounded-2xl bg-[#e8edf5] text-lg font-extrabold text-[#405d83]">03</span>
            <h3 class="mb-2 text-xl font-extrabold text-[#183a32]">Ajukan permintaan</h3>
            <p class="text-[#65756c]">Kirim detail permintaan untuk dikonfirmasi oleh penyedia.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- FORM PERMINTAAN SEWA -->
    <section id="kontak" class="bg-[#183a32] py-20">
      <div class="mx-auto grid w-[90%] max-w-[1180px] grid-cols-[0.85fr_1.15fr] items-start gap-12 max-[800px]:grid-cols-1">
        <div class="pt-5 text-white">
          <p class="mb-3 text-xs font-extrabold tracking-[1.8px] text-[#f3b46f]">MULAI DARI SINI</p>
          <h2 class="mb-5 text-[42px] font-extrabold leading-tight">Ajukan sewa alat untuk proyekmu.</h2>
          <p class="mb-8 max-w-[460px] text-[#d4e0d8]">Isi formulir permintaan. Penyedia perlu mengonfirmasi ketersediaan alat dan jadwal sebelum penyewaan dipastikan.</p>
        </div>

        <form class="rounded-3xl bg-white p-8 shadow-2xl">
          <div class="mb-6">
            <h3 class="text-2xl font-extrabold text-[#183a32]">Formulir permintaan sewa</h3>
            <p class="mt-1 text-sm text-[#65756c]">Lengkapi detail kebutuhan alat dan jadwal.</p>
          </div>

          <div class="grid grid-cols-2 gap-4 max-[600px]:grid-cols-1">
            <label class="text-sm font-bold text-[#34483d]">
              Nama penyewa
              <input type="text" required class="mt-2 w-full rounded-xl border border-[#dfe5dc] px-4 py-3 font-normal outline-none focus:border-[#35634f]" placeholder="Nama lengkap">
            </label>
            <label class="text-sm font-bold text-[#34483d]">
              Nomor telepon
              <input type="tel" required class="mt-2 w-full rounded-xl border border-[#dfe5dc] px-4 py-3 font-normal outline-none focus:border-[#35634f]" placeholder="08xxxxxxxxxx">
            </label>
            <label class="col-span-2 text-sm font-bold text-[#34483d]">
              Pilih alat
              <select class="mt-2 w-full rounded-xl border border-[#dfe5dc] bg-white px-4 py-3 font-normal outline-none focus:border-[#35634f]">
                <option value="">Pilih alat dari katalog</option>
                <?php foreach ($daftarAlat as $alat): ?>
                  <option value="<?= $alat->getId(); ?>"><?= $alat->getName(); ?> — <?= $alat->getHargaFormatted(); ?>/hari</option>
                <?php endforeach; ?>
              </select>
            </label>
          </div>

          <button type="submit" class="mt-6 w-full rounded-full bg-[#e88b36] px-6 py-3.5 font-extrabold text-white transition hover:bg-[#cf7625]">Kirim Permintaan</button>
        </form>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="bg-[#102c25] px-5 py-8 text-center text-sm text-[#d4e0d8]">
    <p class="font-bold text-white">&copy; 2026 BangunSewa.</p>
    <p class="mt-1">Sewa alat bangunan untuk proyek yang lebih siap.</p>
  </footer>

</body>
</html>