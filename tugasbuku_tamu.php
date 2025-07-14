<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Buku Tamu Digital STITEK Bontang</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f5f7fa, #c3cfe2);
      padding: 40px;
      display: flex;
      justify-content: center;
    }

    .container {
      background: #ffffff;
      padding: 40px;
      max-width: 700px;
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      border-top: 8px solid #d35400;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 20px;
      margin-bottom: 6px;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    button {
      margin-top: 30px;
      background-color: #d35400;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }

    .error {
      background-color: #ffecec;
      color: #c0392b;
      padding: 12px;
      border-left: 6px solid #c0392b;
      margin-top: 20px;
      border-radius: 6px;
    }

    .success {
      background-color: #f0fff0;
      border-left: 6px solid #2ecc71;
      padding: 18px;
      margin-top: 30px;
      border-radius: 6px;
    }
  </style>
</head>
<body>
<?php
  $nama = $email = $pesan = "";
  $errors = [];

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $pesan = trim($_POST["pesan"]);

    if (empty($nama)) $errors[] = "Nama tidak boleh kosong.";
    if (empty($email)) $errors[] = "Email tidak boleh kosong.";
    if (empty($pesan)) $errors[] = "Pesan tidak boleh kosong.";

    $nama = htmlspecialchars($nama);
    $email = htmlspecialchars($email);
    $pesan = htmlspecialchars($pesan);
  }
?>

<div class="container">
  <h1>Buku Tamu Digital STITEK Bontang</h1>

  <form method="post" action="">
    <label for="nama">Nama Lengkap</label>
    <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">

    <label for="email">Alamat Email</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>">

    <label for="pesan">Pesan/Komentar</label>
    <textarea id="pesan" name="pesan" rows="5"><?php echo $pesan; ?></textarea>

    <button type="submit">Kirim Pesan</button>
  </form>

  <?php
  if (!empty($errors)) {
    echo "<div class='error'><ul>";
    foreach ($errors as $err) {
      echo "<li>$err</li>";
    }
    echo "</ul></div>";
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($errors)) {
    echo "<div class='success'>";
    echo "<strong>✅ Terima kasih atas pesan Anda!</strong><br>";
    echo "<p><strong>Nama:</strong> $nama</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Pesan:</strong><br>" . nl2br($pesan) . "</p>";
    echo "</div>";
  }
  ?>
</div>

</body>
</html>
