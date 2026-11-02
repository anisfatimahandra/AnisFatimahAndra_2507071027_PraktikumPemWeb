
<?php
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
}

function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 85) {
        return "A";
    } elseif ($nilaiAkhir >= 75) {
        return "B";
    } elseif ($nilaiAkhir >= 65) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "D";
    } else {
        return "E";
    }
}

function tentukanStatus($nilaiAkhir) {
    return ($nilaiAkhir >= 65) ? "Lulus" : "Tidak Lulus";
}

$hasil = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = trim($_POST["nama"]);
    $npm = trim($_POST["npm"]);
    $tugas = $_POST["tugas"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];

    if ($nama == "" || $npm == "" || $tugas == "" || $uts == "" || $uas == "") {
        $error = "Semua data wajib diisi!";
    } elseif (
        !is_numeric($tugas) ||
        !is_numeric($uts) ||
        !is_numeric($uas)
    ) {
        $error = "Nilai harus berupa angka!";
    } elseif (
        $tugas < 0 || $tugas > 100 ||
        $uts < 0 || $uts > 100 ||
        $uas < 0 || $uas > 100
    ) {
        $error = "Nilai harus berada di antara 0 sampai 100!";
    } else {

        $nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
        $grade = tentukanGrade($nilaiAkhir);
        $status = tentukanStatus($nilaiAkhir);

        $hasil = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghitung Nilai Mahasiswa</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Penghitung Nilai Mahasiswa</h1>
        <p>Program Perhitungan Nilai Akhir Mahasiswa</p>
    </div>

    <div class="content">

        <h2>Input Data Mahasiswa</h2>

        <form method="POST" action="">

            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama"
                    placeholder="Masukkan nama mahasiswa"
                    value="<?= isset($nama) ? htmlspecialchars($nama) : '' ?>"
                    required>
            </div>

            <div class="form-group">
                <label>NPM</label>
                <input type="text" name="npm"
                    placeholder="Masukkan NPM"
                    value="<?= isset($npm) ? htmlspecialchars($npm) : '' ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Nilai Tugas (30%)</label>
                <input type="number" name="tugas"
                    min="0" max="100" step="any"
                    placeholder="Masukkan nilai tugas"
                    value="<?= isset($tugas) ? htmlspecialchars($tugas) : '' ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Nilai UTS (30%)</label>
                <input type="number" name="uts"
                    min="0" max="100" step="any"
                    placeholder="Masukkan nilai UTS"
                    value="<?= isset($uts) ? htmlspecialchars($uts) : '' ?>"
                    required>
            </div>

            <div class="form-group">
                <label>Nilai UAS (40%)</label>
                <input type="number" name="uas"
                    min="0" max="100" step="any"
                    placeholder="Masukkan nilai UAS"
                    value="<?= isset($uas) ? htmlspecialchars($uas) : '' ?>"
                    required>
            </div>

            <button type="submit">Hitung Nilai Akhir</button>

        </form>

        <?php if ($error != ""): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($hasil): ?>

            <div class="result">
                <h2>Hasil Perhitungan</h2>

                <p>Nama: <strong><?= htmlspecialchars($nama) ?></strong></p>
                <p>NPM: <strong><?= htmlspecialchars($npm) ?></strong></p>
                <p>Nilai Tugas: <?= htmlspecialchars($tugas) ?></p>
                <p>Nilai UTS: <?= htmlspecialchars($uts) ?></p>
                <p>Nilai UAS: <?= htmlspecialchars($uas) ?></p>

                <hr>

                <p>Nilai Akhir:
                    <strong><?= number_format($nilaiAkhir, 2, ',', '.') ?></strong>
                </p>

                <p>Grade: <strong><?= $grade ?></strong></p>

                <p>Status:
                    <span class="<?= $status == 'Lulus' ? 'lulus' : 'tidak-lulus' ?>">
                        <?= $status ?>
                    </span>
                </p>
            </div>

        <?php endif; ?>

    </div>

    <div class="footer">
        Tugas 2 Pemrograman Web
    </div>

</div>

</body>
</html>
