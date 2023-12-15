<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
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

    button:hover {
        background-color: #555;
    }

    p{
        text-align: center;
    }

    #ikilo{
        width: 50%;
    }

</style>
<body>
    <?php
// Include or define your functions (zodiak, pasaran, zodiaknya, pasarannya)
    include 'test.php';

// Check if the necessary POST data is set
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tanggal"]) && isset($_POST["tanggalnya"])) {
        $tanggal = $_POST["tanggal"];
        $tanggalnya = $_POST["tanggalnya"];

    // Extract day and month from the selected date
        $day = date("j", strtotime($tanggal));
        $month = date("n", strtotime($tanggal));

        $dayPasangan = date("j", strtotime($tanggalnya));
        $monthPasangan = date("n", strtotime($tanggalnya));

    // Call your functions to get the results
        $zodiak = zodiak($day, $month);
        $hasilPasaran = pasaran($tanggal);

        $zodiaknya = zodiaknya($dayPasangan, $monthPasangan);
        $hasilPasarannya = pasarannya($tanggalnya);

    // ...
        $totalNeptu = $hasilPasaran["Jumlah Neptu"] + $hasilPasarannya["Jumlah Neptu"];

// Konversi ke nama-neptu sesuai keterangan
        switch ($totalNeptu) {
            case 1:
            $namaNeptu = "pegat";
            $penjelasan = "Menurut primbon Jawa, pegat dalam hitungan weton memiliki arti cerai atau berpisah. Pegat juga menandakan kemungkinan pasangan sering mengalami masalah dalam kehidupan.";
            break;
            case 2:
            $namaNeptu = "ratu";
            $penjelasan = "Dalam Primbon Jawa, ratu dalam hitungan weton berarti pasangan akan hidup seperti ratu atau diratukan dengan harta dan hidup harmonis. Pasangan ini ditakdirkan untuk berjodoh sehingga disegani dan dihargai oleh masyarakat.";
            break;
            case 3:
            $namaNeptu = "jodoh";
            $penjelasan = "Bagi masyarakat Jawa, weton jodoh dipercaya dapat memberikan gambaran kecocokan pasangan yang akan menikah. Weton jodoh merupakan hasil hitung yang baik untuk pasangan yang mendapatkan perhitungan jodoh.";
            break;
            case 4:
            $namaNeptu = "topo";
            $penjelasan = "
            Arti topo dalam weton adalah pasangan yang menikah akan mengalami kesusahan di awal hidup. Namun, ketika rumah tangga itu sudah bertahan lama, maka kesuksesan dan kebahagiaan akan menyertai.";
            break;
            case 5:
            $namaNeptu = "tinari";
            $penjelasan = "Dalam primbon Jawa, arti Tinari untuk weton kecocokan jodoh dapat mengandung makna bahwa kelak pasangan akan mendapat kehidupan yang bahagia dan memperoleh banyak keberuntungan berupa rezeki.";
            break;
            case 6:
            $namaNeptu = "padu";
            $penjelasan = "Weton padu menunjukkan bahwa pasangan akan sering bertengkar, namun tidak berujung pada perceraian. Pertengkaran ini dapat terjadi karena hal-hal sepele.";
            break;
            case 7:
            $namaNeptu = "sujanan";
            $penjelasan = "Arti sujanan dalam primbon weton Jawa adalah pertengkaran. Sepasang kekasih dengan neptu sujanan diyakini akan menghadapi masalah perselingkuhan dalam hubungannya.";
            break;
            case 8:
            $namaNeptu = "pesthi";
            $penjelasan = "Dalam tradisi Jawa, Pesthi memiliki arti bahwa pasangan suami istri yang memiliki perhitungan Pesthi akan selalu diselimuti oleh keharmonisan hingga masa tua. Pesthi merupakan perhitungan jodoh yang memiliki arti bahwa rumah tangga yang dibangun akan menjadi rukun, nyaman dan damai.";
            break;
            case 9:
            $namaNeptu = "pegat";
            $penjelasan = "Menurut primbon Jawa, pegat dalam hitungan weton memiliki arti cerai atau berpisah. Pegat juga menandakan kemungkinan pasangan sering mengalami masalah dalam kehidupan.";
            break;
            case 10:
            $namaNeptu = "ratu";
            $penjelasan = "Dalam Primbon Jawa, ratu dalam hitungan weton berarti pasangan akan hidup seperti ratu atau diratukan dengan harta dan hidup harmonis. Pasangan ini ditakdirkan untuk berjodoh sehingga disegani dan dihargai oleh masyarakat.";
            break;
            case 11:
            $namaNeptu = "jodoh";
            $penjelasan = "Bagi masyarakat Jawa, weton jodoh dipercaya dapat memberikan gambaran kecocokan pasangan yang akan menikah. Weton jodoh merupakan hasil hitung yang baik untuk pasangan yang mendapatkan perhitungan jodoh.";
            break;
            case 12:
            $namaNeptu = "topo";
            $penjelasan = "
            Arti topo dalam weton adalah pasangan yang menikah akan mengalami kesusahan di awal hidup. Namun, ketika rumah tangga itu sudah bertahan lama, maka kesuksesan dan kebahagiaan akan menyertai.";
            break;
            case 13:
            $namaNeptu = "tinari";
            $penjelasan = "Dalam primbon Jawa, arti Tinari untuk weton kecocokan jodoh dapat mengandung makna bahwa kelak pasangan akan mendapat kehidupan yang bahagia dan memperoleh banyak keberuntungan berupa rezeki.";
            break;
            case 14:
            $namaNeptu = "padu";
            $penjelasan = "Weton padu menunjukkan bahwa pasangan akan sering bertengkar, namun tidak berujung pada perceraian. Pertengkaran ini dapat terjadi karena hal-hal sepele.";
            break;
            case 15:
            $namaNeptu = "sujanan";
            $penjelasan = "Arti sujanan dalam primbon weton Jawa adalah pertengkaran. Sepasang kekasih dengan neptu sujanan diyakini akan menghadapi masalah perselingkuhan dalam hubungannya.";
            break;
            case 16:
            $namaNeptu = "pesthi";
            $penjelasan = "Dalam tradisi Jawa, Pesthi memiliki arti bahwa pasangan suami istri yang memiliki perhitungan Pesthi akan selalu diselimuti oleh keharmonisan hingga masa tua. Pesthi merupakan perhitungan jodoh yang memiliki arti bahwa rumah tangga yang dibangun akan menjadi rukun, nyaman dan damai.";
            break;
            case 17:
            $namaNeptu = "pegat";
            $penjelasan = "Menurut primbon Jawa, pegat dalam hitungan weton memiliki arti cerai atau berpisah. Pegat juga menandakan kemungkinan pasangan sering mengalami masalah dalam kehidupan.";
            break;
            case 18:
            $namaNeptu = "ratu";
            $penjelasan = "Dalam Primbon Jawa, ratu dalam hitungan weton berarti pasangan akan hidup seperti ratu atau diratukan dengan harta dan hidup harmonis. Pasangan ini ditakdirkan untuk berjodoh sehingga disegani dan dihargai oleh masyarakat.";
            break;
            case 19:
            $namaNeptu = "jodoh";
            $penjelasan = "Bagi masyarakat Jawa, weton jodoh dipercaya dapat memberikan gambaran kecocokan pasangan yang akan menikah. Weton jodoh merupakan hasil hitung yang baik untuk pasangan yang mendapatkan perhitungan jodoh.";
            break;
            case 20:
            $namaNeptu = "topo";
            $penjelasan = "
            Arti topo dalam weton adalah pasangan yang menikah akan mengalami kesusahan di awal hidup. Namun, ketika rumah tangga itu sudah bertahan lama, maka kesuksesan dan kebahagiaan akan menyertai.";
            break;
            case 21:
            $namaNeptu = "tinari";
            $penjelasan = "Dalam primbon Jawa, arti Tinari untuk weton kecocokan jodoh dapat mengandung makna bahwa kelak pasangan akan mendapat kehidupan yang bahagia dan memperoleh banyak keberuntungan berupa rezeki.";
            break;
            case 22:
            $namaNeptu = "padu";
            $penjelasan = "Weton padu menunjukkan bahwa pasangan akan sering bertengkar, namun tidak berujung pada perceraian. Pertengkaran ini dapat terjadi karena hal-hal sepele.";
            break;
            case 23:
            $namaNeptu = "sujanan";
            $penjelasan = "Arti sujanan dalam primbon weton Jawa adalah pertengkaran. Sepasang kekasih dengan neptu sujanan diyakini akan menghadapi masalah perselingkuhan dalam hubungannya.";
            break;
            case 24:
            $namaNeptu = "pesthi";
            $penjelasan = "Dalam tradisi Jawa, Pesthi memiliki arti bahwa pasangan suami istri yang memiliki perhitungan Pesthi akan selalu diselimuti oleh keharmonisan hingga masa tua. Pesthi merupakan perhitungan jodoh yang memiliki arti bahwa rumah tangga yang dibangun akan menjadi rukun, nyaman dan damai.";
            break;
            case 25:
            $namaNeptu = "pegat";
            $penjelasan = "Menurut primbon Jawa, pegat dalam hitungan weton memiliki arti cerai atau berpisah. Pegat juga menandakan kemungkinan pasangan sering mengalami masalah dalam kehidupan.";
            break;
            case 26:
            $namaNeptu = "ratu";
            $penjelasan = "Dalam Primbon Jawa, ratu dalam hitungan weton berarti pasangan akan hidup seperti ratu atau diratukan dengan harta dan hidup harmonis. Pasangan ini ditakdirkan untuk berjodoh sehingga disegani dan dihargai oleh masyarakat.";
            break;
            case 27:
            $namaNeptu = "jodoh";
            $penjelasan = "Bagi masyarakat Jawa, weton jodoh dipercaya dapat memberikan gambaran kecocokan pasangan yang akan menikah. Weton jodoh merupakan hasil hitung yang baik untuk pasangan yang mendapatkan perhitungan jodoh.";
            break;
            case 28:
            $namaNeptu = "topo";
            $penjelasan = "
            Arti topo dalam weton adalah pasangan yang menikah akan mengalami kesusahan di awal hidup. Namun, ketika rumah tangga itu sudah bertahan lama, maka kesuksesan dan kebahagiaan akan menyertai.";
            break;
            case 29:
            $namaNeptu = "tinari";
            $penjelasan = "Dalam primbon Jawa, arti Tinari untuk weton kecocokan jodoh dapat mengandung makna bahwa kelak pasangan akan mendapat kehidupan yang bahagia dan memperoleh banyak keberuntungan berupa rezeki.";
            break;
            case 30:
            $namaNeptu = "padu";
            $penjelasan = "Weton padu menunjukkan bahwa pasangan akan sering bertengkar, namun tidak berujung pada perceraian. Pertengkaran ini dapat terjadi karena hal-hal sepele.";
            break;
            case 31:
            $namaNeptu = "sujanan";
            $penjelasan = "Arti sujanan dalam primbon weton Jawa adalah pertengkaran. Sepasang kekasih dengan neptu sujanan diyakini akan menghadapi masalah perselingkuhan dalam hubungannya.";
            break;
            case 32:
            $namaNeptu = "pesthi";
            $penjelasan = "Dalam tradisi Jawa, Pesthi memiliki arti bahwa pasangan suami istri yang memiliki perhitungan Pesthi akan selalu diselimuti oleh keharmonisan hingga masa tua. Pesthi merupakan perhitungan jodoh yang memiliki arti bahwa rumah tangga yang dibangun akan menjadi rukun, nyaman dan damai.";
            break;
            case 33:
            $namaNeptu = "pegat";
            $penjelasan = "Menurut primbon Jawa, pegat dalam hitungan weton memiliki arti cerai atau berpisah. Pegat juga menandakan kemungkinan pasangan sering mengalami masalah dalam kehidupan.";
            break;
            case 34:
            $namaNeptu = "ratu";
            $penjelasan = "Dalam Primbon Jawa, ratu dalam hitungan weton berarti pasangan akan hidup seperti ratu atau diratukan dengan harta dan hidup harmonis. Pasangan ini ditakdirkan untuk berjodoh sehingga disegani dan dihargai oleh masyarakat.";
            break;
            case 35:
            $namaNeptu = "jodoh";
            $penjelasan = "Bagi masyarakat Jawa, weton jodoh dipercaya dapat memberikan gambaran kecocokan pasangan yang akan menikah. Weton jodoh merupakan hasil hitung yang baik untuk pasangan yang mendapatkan perhitungan jodoh.";
            break;
            case 36:
            $namaNeptu = "topo";
            $penjelasan = "
            Arti topo dalam weton adalah pasangan yang menikah akan mengalami kesusahan di awal hidup. Namun, ketika rumah tangga itu sudah bertahan lama, maka kesuksesan dan kebahagiaan akan menyertai.";
            break;
            default:
        $namaNeptu = "Unknown"; // Kondisi default jika tidak sesuai dengan keterangan
    }


    // Display the results
    echo "<table>";
    echo "<tr>";
    echo "<td>";
    echo "<h2>Hasil Anda</h2>";
    echo "<p>Tanggal lahir anda: $tanggal</p>";
    echo "<p>Zodiak: $zodiak</p>";
    echo "<p>Hari Neptu: " . $hasilPasaran["Hari Neptu"] . " (Neptu: " . $hasilPasaran["Neptu Hari"] . ")</p>";
    echo "<p>Pasaran Neptu: " . $hasilPasaran["Pasaran Neptu"] . " (Neptu: " . $hasilPasaran["Neptu Pasaran"] . ")</p>";
    echo "<p>Jumlah Neptu: " . $hasilPasaran["Jumlah Neptu"] . "</p>";
    echo "</td>";
    echo "<td>";
    echo "<h2>Hasil Pasangan Anda</h2>";
    echo "<p>Tanggal lahir pasangan anda: $tanggalnya</p>";
    echo "<p>Zodiak: $zodiaknya</p>";
    echo "<p>Hari Neptu: " . $hasilPasarannya["Hari Neptu"] . " (Neptu: " . $hasilPasarannya["Neptu Hari"] . ")</p>";
    echo "<p>Pasarannya Neptu: " . $hasilPasarannya["Pasarannya Neptu"] . " (Neptu: " . $hasilPasarannya["Neptu Pasarannya"] . ")</p>";
    echo "<p>Jumlah Neptu: " . $hasilPasarannya["Jumlah Neptu"] . "</p>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan=2>";
    echo "<h2>Kesimpulan</h2>";
    echo '<h2><span style="text-transform:uppercase;">'.$namaNeptu.'</span></h2>';
    echo "<p>$penjelasan</p>";
    echo '<p style="color: red;">Disclaimer: Penting untuk Diperhatikan!!!

Weton Jawa atau perhitungan nasib berdasarkan tanggal lahir merupakan suatu tradisi budaya yang memiliki makna historis dan kepercayaan kultural. Kami ingin menegaskan bahwa hasil perhitungan Weton Jawa hanyalah sebagai bentuk hiburan semata dan tidak dapat dijadikan sebagai tolak ukur pasti untuk kehidupan pribadi atau hubungan asmara.

Weton Jawa tidak memiliki dasar ilmiah dan tidak dapat memprediksi masa depan dengan akurasi tinggi. Keberagaman manusia, keputusan individu, dan berbagai faktor lainnya turut memengaruhi jalannya kehidupan.

Semua informasi yang diberikan melalui aplikasi ini dimaksudkan hanya untuk memberikan pandangan umum dan tidak dapat diandalkan sepenuhnya. Kami tidak bertanggung jawab atas keputusan atau tindakan yang diambil berdasarkan hasil perhitungan Weton Jawa.

Kami mendorong pengguna untuk tetap rasional, terbuka, dan menghargai perbedaan dalam setiap hubungan. Kehidupan pribadi dan asmara adalah pengalaman unik masing-masing individu, dan tidak dapat diukur atau dijelaskan sepenuhnya oleh konsep Weton Jawa.

Terima kasih atas pemahaman dan penghargaan Anda terhadap nilai keberagaman dan keunikan setiap individu. Pastikan untuk menjalani kehidupan dengan keyakinan, kebijaksanaan, dan kebahagiaan sesuai dengan pilihan dan nilai-nilai pribadi Anda.</p>';
    echo "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    // Handle the case when POST data is not set
    echo "Invalid request.";
}
?>

</body>
</html>