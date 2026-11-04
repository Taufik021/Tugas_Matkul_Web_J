<?php
class President
{
    private $name;
    private $period;
    private $programs;
    private $profile;

    public function __construct($name, $period, $programs, $profile)
    {
        $this->name = $name;
        $this->period = $period;
        $this->programs = $programs;
        $this->profile = $profile;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function getPrograms()
    {
        return $this->programs;
    }

    public function getProfile()
    {
        return $this->profile;
    }
}

$president = new President(
    'Eko Felix',
    '2044 - 2049',
    ['Pendidikan', 'Kesehatan', 'Infrastruktur'],
    'Presiden Republik Indonesia yang fokus pada pembangunan berkelanjutan, pendidikan, dan transformasi digital.'
);

function escapeHtml($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PresidentKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 px-4 py-10 text-slate-800">
    <main class="mx-auto max-w-3xl overflow-hidden rounded-2xl bg-white shadow-lg">
        <header class="bg-[#111d4a] px-8 py-5 text-white">
            <h1 class="text-2xl font-bold">PresidentKu</h1>
        </header>

        <div class="space-y-8 p-8">
            <section class="flex flex-col items-center gap-6 rounded-xl border-l-4 border-red-600 bg-slate-50 p-6 sm:flex-row">
                <div class="flex h-28 w-28 shrink-0 items-center justify-center rounded-full bg-[#111d4a] text-5xl text-white" aria-hidden="true">
                    👨‍💼
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-[#111d4a]">
                        <?= escapeHtml($president->getName()) ?>
                    </h2>
                    <p class="mb-3 font-semibold text-slate-600">
                        <?= escapeHtml($president->getPeriod()) ?>
                    </p>
                    <p class="leading-relaxed text-slate-600">
                        <?= escapeHtml($president->getProfile()) ?>
                    </p>
                </div>
            </section>

            <section>
                <h2 class="mb-4 border-b-2 border-slate-100 pb-2 text-xl font-bold text-[#111d4a]">
                    Program Utama
                </h2>
                <ul class="grid gap-4 sm:grid-cols-3">
                    <?php foreach ($president->getPrograms() as $program): ?>
                        <li class="rounded-lg border border-slate-200 p-4 text-center font-semibold">
                            <?= escapeHtml($program) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>
    </main>
</body>
</html>
