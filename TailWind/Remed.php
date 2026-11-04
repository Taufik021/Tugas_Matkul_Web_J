<?php
$kodeLengkap = <<<'CODE'
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
?>
CODE;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remedial OOP - PresidentKu</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 32px 16px;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        main {
            max-width: 850px;
            margin: 0 auto;
            padding: 32px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px #0f172a14;
        }
        h1, h2 {
            color: #111d4a;
        }
        section {
            margin: 28px 0;
        }
        pre {
            overflow-x: auto;
            padding: 18px;
            border-radius: 8px;
            background: #0f172a;
            color: #e2e8f0;
            font-size: 14px;
        }
        code {
            font-family: Consolas, monospace;
        }
        .answer {
            padding: 16px 20px;
            border-left: 4px solid #dc2626;
            border-radius: 6px;
            background: #f8fafc;
        }
    </style>
</head>
<body>
    <main>
        <h1>Remedial: Class dan Object PresidentKu</h1>
        <p>Berikut penjelasan tiga soal beserta kode yang digunakan pada aplikasi PresidentKu.</p>

        <section>
            <h2>1. Class apa yang dibuat?</h2>
            <div class="answer">
                <p>Class yang dibuat adalah <code>President</code>. Class merupakan blueprint atau cetak biru yang mendefinisikan struktur data dan perilaku object presiden.</p>
            </div>
            <pre><code><?= htmlspecialchars("class President\n{\n    // Property dan method class President\n}", ENT_QUOTES, 'UTF-8') ?></code></pre>
        </section>

        <section>
            <h2>2. Object apa yang digunakan?</h2>
            <div class="answer">
                <p>Object yang digunakan bernama <code>$president</code>. Object ini dibuat dari class <code>President</code> menggunakan keyword <code>new</code>. Data awal dikirimkan ke constructor.</p>
            </div>
            <pre><code><?= htmlspecialchars("\$president = new President(\n    'Eko Felix',\n    '2044 - 2049',\n    ['Pendidikan', 'Kesehatan', 'Infrastruktur'],\n    'Presiden Republik Indonesia yang fokus pada pembangunan berkelanjutan, pendidikan, dan transformasi digital.'\n);", ENT_QUOTES, 'UTF-8') ?></code></pre>
        </section>

        <section>
            <h2>3. Property apa saja yang dimiliki object?</h2>
            <div class="answer">
                <ul>
                    <li><code>$name</code>: menyimpan nama presiden.</li>
                    <li><code>$period</code>: menyimpan periode masa jabatan.</li>
                    <li><code>$programs</code>: menyimpan daftar program utama.</li>
                    <li><code>$profile</code>: menyimpan deskripsi profil singkat.</li>
                </ul>
                <p>Property menggunakan akses <code>private</code>, sehingga nilainya dibaca melalui getter seperti <code>getName()</code> dan <code>getProfile()</code>.</p>
            </div>
            <pre><code><?= htmlspecialchars("private \$name;\nprivate \$period;\nprivate \$programs;\nprivate \$profile;", ENT_QUOTES, 'UTF-8') ?></code></pre>
        </section>

        <section>
            <h2>Kode lengkap</h2>
            <p>Kode class, property, constructor, getter, dan instansiasi object:</p>
            <pre><code><?= htmlspecialchars($kodeLengkap, ENT_QUOTES, 'UTF-8') ?></code></pre>
        </section>
    </main>
</body>
</html>
