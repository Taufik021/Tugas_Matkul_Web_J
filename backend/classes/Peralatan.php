<?php

require_once __DIR__ . '/../helpers/functions.php';

class Peralatan
{
    public function __construct(
        private int $id,
        private string $name,
        private string $imageUrl,
        private string $imageSource,
        private string $category,
        private string $description,
        private int $pricePerDay
    ) {
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getImageUrl(): string { return $this->imageUrl; }
    public function getImageSource(): string { return $this->imageSource; }
    public function getCategory(): string { return $this->category; }
    public function getDescription(): string { return $this->description; }
    public function getPricePerDay(): int { return $this->pricePerDay; }
    public function getHargaFormatted(): string { return formatRupiah($this->pricePerDay); }

    public function isBestSeller(): bool
    {
        return $this->id === 4;
    }

    public function renderKartu(): string
    {
        $name = htmlspecialchars($this->name, ENT_QUOTES, 'UTF-8');
        $category = htmlspecialchars($this->category, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $imageUrl = htmlspecialchars($this->imageUrl, ENT_QUOTES, 'UTF-8');
        $imageSource = htmlspecialchars($this->imageSource, ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($this->getHargaFormatted(), ENT_QUOTES, 'UTF-8');

        return <<<HTML
<article class="rounded-3xl border border-[#e7ebe4] bg-white p-5 shadow-sm">
  <img src="{$imageUrl}" alt="{$name}" class="h-48 w-full object-contain" loading="lazy">
  <p class="mt-4 text-xs font-bold uppercase text-[#e88b36]">{$category}</p>
  <h2 class="mt-1 text-xl font-bold text-[#183a32]">{$name}</h2>
  <p class="mt-2 text-sm text-[#65756c]">{$description}</p>
  <p class="mt-4 font-extrabold text-[#183a32]">{$price}/hari</p>
  <a class="mt-3 inline-block text-sm underline" href="{$imageSource}" target="_blank" rel="noopener noreferrer">Sumber foto</a>
</article>
HTML;
    }
}
