<?php
$escape = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $alat ? $escape($alat->getName()) . ' - BangunSewa' : 'Alat Tidak Ditemukan - BangunSewa'; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f8f4] p-6 text-[#243047]">
  <main class="mx-auto max-w-3xl rounded-3xl bg-white p-8 shadow">
    <?php if ($alat): ?>
      <a class="font-bold text-[#183a32] underline" href="index.php">← Kembali ke katalog</a>
      <img class="mt-6 h-72 w-full object-contain" src="<?= $escape($alat->getImageUrl()); ?>" alt="<?= $escape($alat->getName()); ?>">
      <p class="mt-6 text-sm font-bold uppercase text-[#e88b36]"><?= $escape($alat->getCategory()); ?></p>
      <h1 class="mt-2 text-3xl font-extrabold text-[#183a32]"><?= $escape($alat->getName()); ?></h1>
      <p class="mt-4 text-[#65756c]"><?= $escape($alat->getDescription()); ?></p>
      <p class="mt-5 text-xl font-extrabold"><?= $escape($alat->getHargaFormatted()); ?>/hari</p>
    <?php else: ?>
      <h1 class="text-3xl font-extrabold text-[#183a32]">Alat tidak ditemukan (404)</h1>
      <p class="mt-3 text-[#65756c]">ID alat yang diminta tidak tersedia di katalog.</p>
      <a class="mt-6 inline-block font-bold text-[#183a32] underline" href="index.php">Kembali ke katalog</a>
    <?php endif; ?>
  </main>
</body>
</html>
