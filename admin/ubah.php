<?php
include 'header.php';

include '../db.php';

// ambil data dari url
$id = $_GET['id'];

// query data berdasarkan id
$baju = query("SELECT * FROM baju04 WHERE id = $id")["0"];

function editsaldo($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $size = htmlspecialchars($data["size"]);
    $lengan = htmlspecialchars($data["lengan"]);
    $nick = htmlspecialchars($data["nick"]);
    $bayar = htmlspecialchars($data["bayar"]);


    $query = "UPDATE baju04 SET
              nama = '$nama',
              size = '$size',
              lengan = '$lengan',
              nick = '$nick',
              bayar = '$bayar'
              WHERE id = $id
              ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit"])) {
    if (editsaldo($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah !!');
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
        <input type="hidden" name="id" value="<?= $baju['id'] ?>">
        <div class="mb-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" required class="form-control" id="nama" autocomplete="off" value="<?= $baju['nama'] ?>">
        </div>
        <div class="mb-4">
            <label for="size" class="form-label">Size</label>
            <select name="size" class="form-control" required id="jenis" value="<?= $baju['size'] ?>">
                <option value="">- Pilih -</option>
                <option <?php if ($baju['size'] == "S") {
                            echo "selected='selected'";
                        } ?> value="S">S</option>
                <option <?php if ($baju['size'] == "M") {
                            echo "selected='selected'";
                        } ?> value="M">M</option>
                <option <?php if ($baju['size'] == "L") {
                            echo "selected='selected'";
                        } ?> value="L">L</option>
                <option <?php if ($baju['size'] == "XL") {
                            echo "selected='selected'";
                        } ?> value="XL">XL</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="lengan" class="form-label">Reques Lengan</label>
            <select name="lengan" class="form-control" required id="lengan" value="<?= $baju['lengan'] ?>">
                <option value="">- Pilih -</option>
                <option <?php if ($baju['lengan'] == "Pendek") {
                            echo "selected='selected'";
                        } ?> value="Pendek">Pendek</option>
                <option <?php if ($baju['lengan'] == "Panjang") {
                            echo "selected='selected'";
                        } ?> value="Panjang">Panjang</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="Nick" class="form-label">Nick Name</label>
            <input type="text" name="nick" required class="form-control" id="Nick" autocomplete="off" placeholder="Masukan Nick Name .." value="<?= $baju['nick'] ?>">
        </div>
        <div class="mb-4">
            <label for="bayar" class="form-label">Bayar</label>
            <input type="number" name="bayar" class="form-control" id="bayar" autocomplete="off" value="<?= $baju['bayar'] ?>"></input>
        </div>
        <div class="mb-4 text-end">
            <a href="index.php" class="btn btn-danger">Batal</a>
            <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
        </div>
    </form>
</div>


<?php include 'footer.php'  ?>


?>