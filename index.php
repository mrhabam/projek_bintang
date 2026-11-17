<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga 4 Arah Simetris - PHP Native</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-top: 0;
            color: #2c3e50;
        }
        form {
            margin-bottom: 25px;
        }
        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        .error {
            background-color: #fdecea;
            color: #e74c3c;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
            font-weight: bold;
        }
        /* Grid 2x2 agar 4 segitiga tersusun rapi dan seimbang */
        .grid-hasil {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .card-segitiga {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card-segitiga h3 {
            margin: 0 0 15px 0;
            font-size: 16px;
            color: #3498db;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .card-segitiga pre {
            margin: 0;
            text-align: left;
            font-family: 'Consolas', 'Courier New', monospace;
            font-size: 16px;
            line-height: 1.15;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Generator Segitiga 4 Arah </h2>
    <p>Masukkan tinggi segitiga (bilangan bulat 1 sampai 20):</p>

    <form method="POST" action="">
        <input type="text" name="tinggi" placeholder="Contoh: 7" value="<?= isset($_POST['tinggi']) ? htmlspecialchars($_POST['tinggi']) : '' ?>" required>
        <button type="submit" name="submit">Buat 4 Segitiga</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input = trim($_POST['tinggi']);

        $opsi_validasi = [
            'options' => [
                'min_range' => 1,
                'max_range' => 20
            ]
        ];

        if (filter_var($input, FILTER_VALIDATE_INT, $opsi_validasi) === false) {
            echo '<div class="error">Input tidak valid! Harap masukkan bilangan bulat antara 1 sampai 20.</div>';
        } else {
            $tinggi = (int) $input;
            echo '<div class="grid-hasil">';

            // segitiga atas
            echo '<div class="card-segitiga"><h3>Segitiga Atas</h3><pre>';
            for ($baris = 1; $baris <= $tinggi; $baris++) {
                for ($spasi = $tinggi; $spasi > $baris; $spasi--) {
                    echo " ";
                }
                for ($bintang = 1; $bintang <= (2 * $baris - 1); $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            echo '</pre></div>';

            //segitiga bawah
            echo '<div class="card-segitiga"><h3>Segitiga Bawah</h3><pre>';
            for ($baris = $tinggi; $baris >= 1; $baris--) {
                for ($spasi = $tinggi; $spasi > $baris; $spasi--) {
                    echo " ";
                }
                for ($bintang = 1; $bintang <= (2 * $baris - 1); $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            echo '</pre></div>';

            //segitiga kanan
            echo '<div class="card-segitiga"><h3>Segitiga Kanan</h3><pre>';
            // Bagian atas hingga titik puncak tengah
            for ($baris = 1; $baris <= $tinggi; $baris++) {
                for ($bintang = 1; $bintang <= $baris; $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            // Bagian bawah setelah titik puncak
            for ($baris = $tinggi - 1; $baris >= 1; $baris--) {
                for ($bintang = 1; $bintang <= $baris; $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            echo '</pre></div>';

            //segitiga kiri
            echo '<div class="card-segitiga"><h3>Segitiga Kiri</h3><pre>';
            // Bagian atas hingga titik puncak tengah
            for ($baris = 1; $baris <= $tinggi; $baris++) {
                for ($spasi = $tinggi; $spasi > $baris; $spasi--) {
                    echo " ";
                }
                for ($bintang = 1; $bintang <= $baris; $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            // Bagian bawah setelah titik puncak
            for ($baris = $tinggi - 1; $baris >= 1; $baris--) {
                for ($spasi = $tinggi; $spasi > $baris; $spasi--) {
                    echo " ";
                }
                for ($bintang = 1; $bintang <= $baris; $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            echo '</pre></div>';

            echo '</div>'; // Tutup .grid-hasil
        }
    }
    ?>
</div>

</body>
</html>
