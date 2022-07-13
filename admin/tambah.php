<?php
include 'header.php';

include '../db.php';

function tambahsaldo($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $size = htmlspecialchars($data["size"]);
    $lengan = htmlspecialchars($data["lengan"]);
    $nick = htmlspecialchars($data["nick"]);
    $bayar = htmlspecialchars($data["bayar"]);


    // query insert data
    $query = "INSERT INTO baju04
                VALUES
                ('', '$nama', '$size', '$lengan', '$nick', '$bayar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit"])) {
    if (tambahsaldo($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan !!');
        document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo "<script>
        alert('data gagal ditambahkan !!');
        document.location.href = 'index.php';
        </script>";
    }
}



?>
<h3 class="p-3 text-center">Tambah Data</h3>

<div class="card-body">
    <form action="" method="POST">
        <div class="mb-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" required class="form-control" id="nama" autocomplete="off" required>
        </div>
        <div class="mb-4">
            <label for="size" class="form-label">Size</label>
            <select name="size" class="form-control" required id="jenis" required>
                <option value="">- Pilih -</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="lengan" class="form-label">Reques Lengan</label>
            <select name="lengan" class="form-control" required id="lengan" required>
                <option value="">- Pilih -</option>
                <option value="Pendek">Pendek</option>
                <option value="Panjang">Panjang</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="Nick" class="form-label">Nick Name</label>
            <input type="text" name="nick" required class="form-control" id="Nick" autocomplete="off" required placeholder="Masukan Nick Name ..">
        </div>
        <div class="mb-4">
            <label for="bayar" class="form-label">Bayar</label>
            <input type="number" name="bayar" class="form-control" id="bayar" autocomplete="off"></input>
        </div>
        <div class="mb-4 text-end">
            <a href="index.php" class="btn btn-danger">Batal</a>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
</div>


<?php include 'footer.php'  ?>