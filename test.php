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
            <td>
                <h2>Tanggal Lahir Pasangan Anda</h2>
                <form method="post" action="" id="formTanggalPasangan">
                    <label for="tanggalnya">Tanggal:</label>
                    <input type="date" id="tanggalnya" name="tanggalnya" required>
                </form>
            </td>
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
