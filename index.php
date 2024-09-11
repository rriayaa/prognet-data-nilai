<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="styles.css"> <!-- Menghubungkan file CSS eksternal -->
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>
        <table id="siswaTable">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Matematika</th>
                    <th>Bahasa Inggris</th>
                    <th>IPA</th>
                    <th>Rata-Rata</th>
                    <th>Status</th>
                    <th>Mata Pelajaran yang Perlu Diperbaiki</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data siswa
                $siswa = [
                    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
                    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
                    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
                    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
                    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
                ];

                // Variabel untuk menghitung jumlah siswa lulus dan tidak lulus
                $lulus = 0;
                $tidakLulus = 0;

                foreach ($siswa as $data) {
                    $avg = ($data['matematika'] + $data['bahasa_inggris'] + $data['ipa']) / 3;
                    $status = $avg >= 75 ? 'Lulus' : 'Tidak Lulus';
                    $nilaiPerbaiki = "-"; // Default jika tidak ada yang perlu diperbaiki

                    // Menentukan mata pelajaran yang perlu diperbaiki untuk siswa yang tidak lulus
                    if ($status === 'Tidak Lulus') {
                        $lowestValue = min($data['matematika'], $data['bahasa_inggris'], $data['ipa']);
                        $nilaiPerbaiki = $lowestValue === $data['matematika'] ? 'Matematika' :
                                         ($lowestValue === $data['bahasa_inggris'] ? 'Bahasa Inggris' : 'IPA');
                        $tidakLulus++;
                    } else {
                        $lulus++;
                    }

                    echo "<tr>
                        <td>{$data['nama']}</td>
                        <td>{$data['matematika']}</td>
                        <td>{$data['bahasa_inggris']}</td>
                        <td>{$data['ipa']}</td>
                        <td>" . number_format($avg, 2) . "</td>
                        <td>{$status}</td>
                        <td>{$nilaiPerbaiki}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>

        <p>Total Siswa Lulus: <?php echo $lulus; ?></p>
        <p>Total Siswa Tidak Lulus: <?php echo $tidakLulus; ?></p>
    </div>
</body>
</html>
