<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zodiak dan Pasaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 10px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="date"] {
            padding: 10px; /* Adjusted padding for better visual balance */
            width: 90%;
            text-align: center;
            margin: 5px 0; /* Added margin for better spacing */
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        #kesimpulanContainer {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        #ikilo{
            width: 50%;
        }


    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2"><h1>WETON JODOH</h1></td>
        </tr>
        <tr id="inputFormsRow">
            <td id="ikilo">
                <h2>Tanggal Lahir Anda</h2>
                <form method="post" action="" id="formTanggal">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </form>
            </td>
            <?php
            function zodiak($day, $month) {
                $zodiac = "";
                if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
                    $zodiac = "Aries";
                } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
                    $zodiac = "Taurus";
                } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
                    $zodiac = "Gemini";
                } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
                    $zodiac = "Cancer";
                } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
                    $zodiac = "Leo";
                } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
                    $zodiac = "Virgo";
                } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
                    $zodiac = "Libra";
                } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
                    $zodiac = "Scorpio";
                } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
                    $zodiac = "Sagittarius";
                } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
                    $zodiac = "Capricorn";
                } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
                    $zodiac = "Aquarius";
                } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
                    $zodiac = "Pisces";
                }
                return $zodiac;
            }

            function pasaran($tanggal) {
                $pasaranArr = ["Legi", "Pahing", "Pon", "Wage", "Kliwon"];

                $tanggalInput = new DateTime($tanggal);

    // Tanggal referensi untuk perhitungan
                $tanggalReferensi = new DateTime("1899-12-31");

    // Hitung selisih hari
                $selisihHari = $tanggalInput->diff($tanggalReferensi)->days;

    // Hitung indeks pasaran
    $pasaranIndex = ($selisihHari % 5); // Pasaran dihitung dari 0 (Legi) sampai 4 (Kliwon)

    // Daftar nama hari dalam bahasa Indonesia
    $namaHariArr = [
        1 => "Senin",
        2 => "Selasa",
        3 => "Rabu",
        4 => "Kamis",
        5 => "Jumat",
        6 => "Sabtu",
        7 => "Minggu",
    ];

    $hariNeptuArr = [
        "Senin" => 4,
        "Selasa" => 3,
        "Rabu" => 7,
        "Kamis" => 8,
        "Jumat" => 6,
        "Sabtu" => 9,
        "Minggu" => 5,
    ];

    // Mendapatkan nama hari dalam bahasa Indonesia
    $namaHari = $namaHariArr[$tanggalInput->format('N')];

    // Menetapkan nilai Neptu berdasarkan nama pasaran
    $neptuPasaran = 0; // Default value jika tidak ada pasaran yang sesuai

    if ($pasaranArr[$pasaranIndex] === "Legi") {
        $neptuPasaran = 5;
    } elseif ($pasaranArr[$pasaranIndex] === "Pahing") {
        $neptuPasaran = 9;
    } elseif ($pasaranArr[$pasaranIndex] === "Pon") {
        $neptuPasaran = 7;
    } elseif ($pasaranArr[$pasaranIndex] === "Wage") {
        $neptuPasaran = 4;
    } elseif ($pasaranArr[$pasaranIndex] === "Kliwon") {
        $neptuPasaran = 8;
    }

    // Menyusun hasil dengan format yang diinginkan
    $hasil = [
        "Hari Neptu" => $namaHari,
        "Pasaran Neptu" => $pasaranArr[$pasaranIndex],
        "Neptu Hari" => $hariNeptuArr[$namaHari],
        "Neptu Pasaran" => $neptuPasaran,
        "Jumlah Neptu" => $hariNeptuArr[$namaHari] + $neptuPasaran,
    ];

    return $hasil;
}
?>
<td>
    <h2>Tanggal Lahir Pasangan Anda</h2>
    <form method="post" action="" id="formTanggalPasangan">
        <label for="tanggalnya">Tanggal:</label>
        <input type="date" id="tanggalnya" name="tanggalnya" required>
    </form>
</td>
<?php
function zodiaknya($day, $month) {
    $zodiac = "";
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        $zodiac = "Aries";
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        $zodiac = "Taurus";
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        $zodiac = "Gemini";
    } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        $zodiac = "Cancer";
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        $zodiac = "Leo";
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        $zodiac = "Virgo";
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        $zodiac = "Libra";
    } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        $zodiac = "Scorpio";
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        $zodiac = "Sagittarius";
    } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        $zodiac = "Capricorn";
    } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        $zodiac = "Aquarius";
    } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        $zodiac = "Pisces";
    }
    return $zodiac;
}

function pasarannya($tanggal) {
    $pasarannyaArr = ["Legi", "Pahing", "Pon", "Wage", "Kliwon"];

    $tanggalInput = new DateTime($tanggal);

    // Tanggal referensi untuk perhitungan
    $tanggalReferensi = new DateTime("1899-12-31");

    // Hitung selisih hari
    $selisihHari = $tanggalInput->diff($tanggalReferensi)->days;

    // Hitung indeks pasarannya
    $pasarannyaIndex = ($selisihHari % 5); // Pasarannya dihitung dari 0 (Legi) sampai 4 (Kliwon)

    // Daftar nama hari dalam bahasa Indonesia
    $namaHariArr = [
        1 => "Senin",
        2 => "Selasa",
        3 => "Rabu",
        4 => "Kamis",
        5 => "Jumat",
        6 => "Sabtu",
        7 => "Minggu",
    ];

    $hariNeptuArr = [
        "Senin" => 4,
        "Selasa" => 3,
        "Rabu" => 7,
        "Kamis" => 8,
        "Jumat" => 6,
        "Sabtu" => 9,
        "Minggu" => 5,
    ];

    // Mendapatkan nama hari dalam bahasa Indonesia
    $namaHari = $namaHariArr[$tanggalInput->format('N')];

    // Menetapkan nilai Neptu berdasarkan nama pasarannya
    $neptuPasarannya = 0; // Default value jika tidak ada pasarannya yang sesuai

    if ($pasarannyaArr[$pasarannyaIndex] === "Legi") {
        $neptuPasarannya = 5;
    } elseif ($pasarannyaArr[$pasarannyaIndex] === "Pahing") {
        $neptuPasarannya = 9;
    } elseif ($pasarannyaArr[$pasarannyaIndex] === "Pon") {
        $neptuPasarannya = 7;
    } elseif ($pasarannyaArr[$pasarannyaIndex] === "Wage") {
        $neptuPasarannya = 4;
    } elseif ($pasarannyaArr[$pasarannyaIndex] === "Kliwon") {
        $neptuPasarannya = 8;
    }

    // Menyusun hasil dengan format yang diinginkan
    $hasil = [
        "Hari Neptu" => $namaHari,
        "Pasarannya Neptu" => $pasarannyaArr[$pasarannyaIndex],
        "Neptu Hari" => $hariNeptuArr[$namaHari],
        "Neptu Pasarannya" => $neptuPasarannya,
        "Jumlah Neptu" => $hariNeptuArr[$namaHari] + $neptuPasarannya,
    ];

    return $hasil;
}
?>
</tr>
<tr>
    <td colspan="2">
        <h1>
            <button id="lihatKesimpulan">LIHAT KESIMPULAN</button>
        </h1>
        <p id="kesimpulanContainer"></p>
    </td>
</tr>
</table>
<script>
    document.getElementById('lihatKesimpulan').addEventListener('click', function() {
            // Get selected dates
            var tanggal = document.getElementById('tanggal').value;
            var tanggalnya = document.getElementById('tanggalnya').value;

            // Validate that both dates are selected
            if (tanggal && tanggalnya) {
                // Fetch and display the conclusion from the server using AJAX
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            document.documentElement.innerHTML = xhr.responseText;
                        } else {
                            console.error('AJAX request failed with status ' + xhr.status);
                        }
                    }
                };

                // Replace "get_kesimpulan.php" with the actual path to your server-side script
                xhr.open('POST', 'get_kesimpulan.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('tanggal=' + tanggal + '&tanggalnya=' + tanggalnya);
            } else {
                alert('Pilih tanggal terlebih dahulu untuk keduanya.');
            }
        });
    </script>
</body>
</html>
